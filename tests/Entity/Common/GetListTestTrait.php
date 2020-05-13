<?php

namespace MoySklad\Tests\Entity\Common;

trait GetListTestTrait
{
    public function testGetList()
    {
        $objects = self::getClient()->getList()->rows;
        $objects = self::indexObjectsList($objects, 'id');

        $this->assertGreaterThanOrEqual(count(self::$createdObjects), count($objects));

        foreach (self::$createdObjects as $createdObject) {
            $this->assertArrayHasKey($createdObject->id, $objects);
            $this->compareObjects($createdObject, $objects[$createdObject->id]);
        }
    }
}
