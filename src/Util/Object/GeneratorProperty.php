<?php

declare(strict_types=1);

namespace MoySklad\Util\Object;

use Doctrine\Common\Annotations\AnnotationReader;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Type;

class GeneratorProperty
{
    /**
     * @var AnnotationReader
     */
    private $annotationReader;

    public function __construct()
    {
        $this->annotationReader = new AnnotationReader();
    }

    public function getGeneratorPropertyNames(string $class): array
    {
        return array_keys($this->getGeneratorProperties($class));
    }

    /**
     * @param string $class
     * @param array  $excludeProperties
     *
     * @return Generator[]
     * @throws \ReflectionException
     */
    public function getGeneratorProperties(string $class, array $excludeProperties = []): array
    {
        $properties = [];
        foreach ((new \ReflectionClass($class))->getProperties() as $reflectionProperty) {
            if (in_array($reflectionProperty->name, $excludeProperties)) {
                continue;
            }

            $propertyAnnotations = $this->annotationReader->getPropertyAnnotations($reflectionProperty);

            if (empty($generatorConfig = $this->getGeneratorConfig($propertyAnnotations))) {
                continue;
            }

            if (empty($serializerType = $this->getPropertySerializerType($propertyAnnotations))) {
                continue;
            }

            $generatorConfig->name = $reflectionProperty->name;
            $generatorConfig->serializerType = $serializerType;
            if (empty($generatorConfig->type)) {
                $generatorConfig->type = $serializerType;
            }

            $properties[$reflectionProperty->name] = $generatorConfig;
        }

        return $properties;
    }

    private function getGeneratorConfig(array $propertyAnnotations): ?Generator
    {
        foreach ($propertyAnnotations as $propertyAnnotation) {
            if ($propertyAnnotation instanceof Generator) {
                return $propertyAnnotation;
            }
        }

        return null;
    }

    private function getPropertySerializerType(array $propertyAnnotations)
    {
        foreach ($propertyAnnotations as $propertyAnnotation) {
            if ($propertyAnnotation instanceof Type) {
                return $propertyAnnotation->name;
            }
        }

        return null;
    }
}
