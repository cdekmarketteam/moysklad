<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\Order;
use MoySklad\Util\Param\StandardFilter;

trait GetListWithOrderTestTrait
{
    public function testGetListWithOrderAsc()
    {
        $key = static::getKey();
        $params = [
            StandardFilter::like($key, self::$propertyValuePrefix . ' one'),
            Order::asc($key),
        ];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(count(self::$createdObjects), $objects);

        foreach ($objects as $i => $object) {
            $this->assertEquals(self::$names[$i], $object->$key);
        }
    }

    public function testGetListWithOrderDesc()
    {
        $key = static::getKey();
        $params = [
            StandardFilter::like($key, self::$propertyValuePrefix . ' one'),
            Order::desc($key),
        ];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(count(self::$createdObjects), $objects);

        $names = array_reverse(self::$names);
        foreach ($objects as $i => $object) {
            $this->assertEquals($names[$i], $object->$key);
        }
    }
}
