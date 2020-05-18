<?php

namespace MoySklad\Tests\Entity\Common;

trait CreateTestTrait
{
    public function testCreate()
    {
        $this->compareObjects(self::$object, self::$createdObject);
    }
}
