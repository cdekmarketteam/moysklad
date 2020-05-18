<?php

declare(strict_types=1);

namespace MoySklad\Util\Object;

use MoySklad\ApiClient;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator as GeneratorConfig;
use MoySklad\Util\Object\ValueGenerator\ValueGenerator;

class ObjectBuilder
{
    /**
     * @var ApiClient
     */
    private $api;

    /**
     * @var ObjectCollection
     */
    private $objectCollection;

    /**
     * @var GeneratorProperty
     */
    private $generatorProperty;

    /**
     * @var ValueGenerator
     */
    private $valueGenerator;

    public function __construct(
        ApiClient $api,
        ObjectCollection $objectCollection,
        GeneratorProperty $generatorProperty,
        ValueGenerator $valueGenerator
    ) {
        $this->api               = $api;
        $this->objectCollection  = $objectCollection;
        $this->generatorProperty = $generatorProperty;
        $this->valueGenerator    = $valueGenerator;
    }

    public function build(
        string $class,
        array $propertyValues = [],
        array $excludeProperties = [],
        ?string $property = null
    ) {
        $object = new $class();
        $generatorProperties = $this->generatorProperty->getGeneratorProperties($class, $excludeProperties);

        if (!empty($property)) {
            $object->$property = $this->valueGenerator->generate($generatorProperties[$property]);
            return $object;
        }

        $this->generateAndSetPropertyValues($object, $generatorProperties);

        // call after generateAndSetPropertyValues method
        // in order to have an opportunity comparing 'in values' with property values
        // which are set in the generateAndSetPropertyValues method
        $this->setNullIfNotIn($object, $generatorProperties);

        $this->setPropertyValues($object, $propertyValues);

        return $object;
    }

    /**
     * @param object            $object
     * @param GeneratorConfig[] $generatorConfigs
     */
    private function generateAndSetPropertyValues(object $object, array $generatorConfigs)
    {
        foreach ($generatorConfigs as $property => $generatorConfig) {
            $object->$property = $this->valueGenerator->generate($generatorConfig);
        }
    }

    public function createObject(string $class, ?string $property = null)
    {
        $object = $this->build($class, [], [], $property);
        if ($object instanceof MetaEntity && $this->api->entity()->hasEntity($class)) {
            $object = $this->api->entity()->byClass($class)->create($object);
            $this->objectCollection->add($object);
        }

        return $object;
    }

    private function setNullIfNotIn(object $object, array $generatorProperties)
    {
        foreach ($generatorProperties as $property => $generatorConfig) {
            if (empty($generatorConfig->setNullIfNotIn)) {
                continue;
            }

            $setNull = true;
            foreach ($generatorConfig->setNullIfNotIn as $dependencyProperty => $values) {
                $setNull = $setNull && !in_array($object->$dependencyProperty, $values);
            }

            if ($setNull) {
                $object->$property = null;
            }
        }
    }

    private function setPropertyValues(object $object, array $propertyValues)
    {
        foreach ($propertyValues as $property => $value) {
            $object->$property = $value;
        }
    }
}
