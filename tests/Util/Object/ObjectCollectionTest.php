<?php

namespace MoySklad\Tests\Util\Object;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ObjectCollection;

class ObjectCollectionTest extends TestCase
{
    public function testAddAndGetAll()
    {
        $object0 = new \stdClass();
        $object0->a = 1;
        $object1 = new \stdClass();
        $object1->b = 2;
        $object2 = new \stdClass();
        $object2->c = 3;

        $objectCollection = new ObjectCollection();
        $objectCollection->add($object0);
        $objectCollection->add($object1);
        $objectCollection->add($object2);

        $this->assertEquals([$object0, $object1, $object2], $objectCollection->getAll());
    }
}
