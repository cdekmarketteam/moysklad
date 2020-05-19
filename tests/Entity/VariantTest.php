<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\Entity\Common;
use MoySklad\Entity\Variant;

class VariantTest extends AbstractEntityTest
{
    use Common\CreateTestTrait {
        testCreate as traitTestCreate;
    }
    use Common\GetTestTrait,
        Common\GetListAndFindOneTestTrait,
        Common\CreateMultipleTestTrait,
        Common\GetListTestTrait,
        Common\GetListWithLimitTestTrait,
        Common\GetListWithSearchTestTrait;

    protected static function getClass(): string
    {
        return Variant::class;
    }

    protected static function getKey(): string
    {
        return 'code';
    }

    public function testCreate()
    {
        $this->traitTestCreate();
    }

    /**
     * @depends testCreate
     */
    public function testUpdate()
    {
        $property = static::getKey();
        $excludeProperties = ['product'];
        self::$object = self::buildObject([$property => self::$propertyValuePrefix . ' updated'], $excludeProperties);
        self::$createdObject = self::getClient()->update(self::$createdObject->id, self::$object);

        $this->assertEquals(self::$object->$property, self::$createdObject->$property);
    }
}
