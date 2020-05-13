<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\EntityFilter;
use MoySklad\Util\Param\Order;

trait GetListWithEntityFilterTestTrait
{
    public function testGetListWithEntityFilter()
    {
        $key = static::getKey();
        $createdObject = array_values(self::$createdObjects)[0];
        $params = [
            EntityFilter::eq($key, $createdObject),
            Order::asc($key),
        ];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(1, $objects);
        $this->compareObjects($createdObject, $objects[0]);
    }
}
