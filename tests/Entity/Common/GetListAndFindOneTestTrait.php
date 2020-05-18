<?php

namespace MoySklad\Tests\Entity\Common;

trait GetListAndFindOneTestTrait
{
    public function testGetListAndFindOne()
    {
        $objects = self::getClient()->getList()->rows;
        $objects = self::indexObjectsList($objects, 'id');

        $this->assertArrayHasKey(self::$createdObject->id, $objects);
        $this->compareObjects(self::$createdObject, $objects[self::$createdObject->id]);
    }
}
