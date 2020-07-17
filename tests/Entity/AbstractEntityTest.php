<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\AbstractApiTest;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Tests\Entity\Common\CreateMultipleTestTrait;
use MoySklad\Util\Object\GeneratorProperty;
use MoySklad\Util\Object\ObjectBuilder;
use MoySklad\Util\Object\ObjectCollection;
use MoySklad\Util\Object\ValueGenerator\ValueGenerator;
use MoySklad\Util\Object\ValueGenerator\GeneratorFactory;

abstract class AbstractEntityTest extends AbstractApiTest
{
    /**
     * @var GeneratorProperty
     */
    protected static $generatorProperty;

    /**
     * @var ObjectBuilder
     */
    protected static $objectBuilder;

    /**
     * @var ObjectCollection
     */
    protected static $objectCollection;

    /**
     * @var string
     */
    protected static $propertyValuePrefix;

    /**
     * @var MetaEntity
     */
    protected static $object;

    /**
     * @var MetaEntity
     */
    protected static $createdObject;

    /**
     * @var MetaEntity[]
     */
    protected static $objects = [];

    /**
     * @var MetaEntity[]
     */
    protected static $createdObjects = [];

    /**
     * @var string[]
     */
    protected static $names = [];

    abstract protected static function getClass(): string;
    abstract protected static function getKey(): string;

    public static function setUpBeforeClass() : void
    {
        parent::setUpBeforeClass();

        self::$propertyValuePrefix = (string) microtime(true) * 10000;
        self::$objectCollection = new ObjectCollection();
        self::$generatorProperty = new GeneratorProperty();
        $generatorFactory = new GeneratorFactory(self::$api, self::$generatorProperty);
        self::$objectBuilder = new ObjectBuilder(
            self::$api,
            self::$objectCollection,
            self::$generatorProperty,
            new ValueGenerator($generatorFactory),
        );
        $generatorFactory->setObjectBuilder(self::$objectBuilder);

        self::createObject();
        self::createMultipleObjects();
    }

    public static function tearDownAfterClass() : void
    {
        self::getClient()->delete(self::$createdObject->id);
        self::checkDeletedObject(self::$createdObject);

        self::deleteMultipleObjects();
        self::deleteRelatedObjects();
    }

    protected static function createObject()
    {
        self::$object = self::buildObject();
        self::$createdObject = self::getClient()->create(self::$object);
    }

    protected static function createMultipleObjects()
    {
        if (!self::hasTrait(CreateMultipleTestTrait::class)) {
            return;
        }

        $key = static::getKey();
        self::$names = [
            self::$propertyValuePrefix . ' one',
            self::$propertyValuePrefix . ' one two',
            self::$propertyValuePrefix . ' one two three',
        ];
        self::$objects = [
            self::buildObject([$key => self::$names[0]]),
            self::buildObject([$key => self::$names[1]]),
            self::buildObject([$key => self::$names[2]]),
        ];

        self::$createdObjects = self::getClient()->massUpdate(self::$objects);
        self::$createdObjects = self::indexObjectsList(self::$createdObjects, $key);
    }

    protected static function deleteMultipleObjects()
    {
        if (empty(self::$createdObjects)) {
            return;
        }

        $metas = [];
        foreach (self::$createdObjects as $createdObject) {
            $metas[] = ['meta' => $createdObject->getMeta()];
        }

        self::getClient()->massDelete($metas);
        foreach (self::$createdObjects as $createdObject) {
            self::checkDeletedObject($createdObject);
        }
    }

    protected static function deleteRelatedObjects()
    {
        foreach (array_reverse(self::$objectCollection->getAll()) as $object) {
            if ($object instanceof MetaEntity) {
                self::$api->entity()->byClass(get_class($object))->delete($object->id);
            }
        }
    }

    protected static function hasTrait(string $trait): bool
    {
        return isset(class_uses(get_called_class())[$trait]);
    }

    protected function compareObjects($expectedObject, $actualObject)
    {
        $class = get_class($expectedObject);
        foreach (self::$generatorProperty->getGeneratorPropertyNames($class) as $property) {
            $message = "'$property' property of '$class' class is not equal for original and created objects";

            if (is_object($expectedObject->$property)) {
                if (method_exists($expectedObject->$property, 'fetch')) {
                    $expectedObject->$property->fetch(self::$api);
                    if (!$actualObject->$property) {
                        var_dump($actualObject);
                        var_dump($property);
                    }
                    $actualObject->$property->fetch(self::$api);
                }

                $this->compareObjects($expectedObject->$property, $actualObject->$property);
            } elseif (is_array($expectedObject->$property)) {
                $expectedValue = $expectedObject->$property;
                $actualValue = $expectedObject->$property;
                sort($expectedValue);
                sort($actualValue);

                $this->assertEquals($expectedValue, $actualValue, $message);
            } else {
                $this->assertEquals($expectedObject->$property, $actualObject->$property, $message);
            }
        }
    }

    protected static function buildObject(array $propertyValues = [], array $excludeProperties = []): MetaEntity
    {
        return self::$objectBuilder->build(static::getClass(), $propertyValues, $excludeProperties);
    }

    protected static function checkDeletedObject(MetaEntity $deletedObject)
    {
        try {
            $object = self::getClient()->get($deletedObject->id);
            if ($object instanceof MetaEntity) {
                self::fail('Failed to delete object for ' . static::getClass() . ' with id = ' . $deletedObject->id);
            }
        } catch (ApiClientException $e) {
            self::assertEquals(404, $e->getCode());
        }
    }

    protected static function getClient(): EntityClientBase
    {
        return self::$api->entity()->byClass(static::getClass());
    }

    protected static function indexObjectsList(array $objects, string $indexProperty): array
    {
        $indexedList = [];
        foreach ($objects as $object) {
            $indexedList[$object->$indexProperty] = $object;
        }

        return $indexedList;
    }
}
