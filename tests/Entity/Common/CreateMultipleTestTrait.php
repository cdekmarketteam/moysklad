<?php

namespace MoySklad\Tests\Entity\Common;

trait CreateMultipleTestTrait
{
    public function testCreateMultiple()
    {
        $key = static::getKey();
        $this->assertCount(count(self::$objects), self::$createdObjects);

        foreach (self::$objects as $object) {
            $this->assertArrayHasKey($object->$key, self::$createdObjects);
            $this->compareObjects($object, self::$createdObjects[$object->$key]);
        }
    }
}
