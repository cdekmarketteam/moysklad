<?php

namespace MoySklad\Tests\Entity\Common;

trait GetTestTrait
{
    public function testGet()
    {
        $retrievedObject = self::getClient()->get(self::$createdObject->id);
        $this->compareObjects(self::$createdObject, $retrievedObject);
    }
}
