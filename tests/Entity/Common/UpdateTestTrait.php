<?php

namespace MoySklad\Tests\Entity\Common;

trait UpdateTestTrait
{
    public function testUpdate()
    {
        $property = static::getKey();
        self::$object = self::buildObject([$property => self::$propertyValuePrefix . ' updated']);
        self::$createdObject = self::getClient()->update(self::$createdObject->id, self::$object);

        $this->assertEquals(self::$object->$property, self::$createdObject->$property);
    }
}
