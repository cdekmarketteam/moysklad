<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\StandardFilter;

trait GetListWithStandardFilterTestTrait
{
    public function testGetListWithStandardFilterNameEq()
    {
        $createdObject = array_values(self::$createdObjects)[1];
        $key = static::getKey();
        $value = $createdObject->$key;
        $params = [StandardFilter::eq($key, $value)];
        $objects = self::getClient()->getList($params)->rows;

        $message = "Failed to find object with '$key' = '$value'";
        $this->assertCount(1, $objects, $message);
    }

    public function testGetListWithStandardFilterNameNotEq()
    {
        $property = static::getKey();
        $params = [StandardFilter::neq($property, '')];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertGreaterThanOrEqual(count(self::$createdObjects), count($objects));
    }

    public function testGetListWithStandardFilterNameLikeAll()
    {
        $property = static::getKey();
        $params = [StandardFilter::like($property, self::$propertyValuePrefix . ' one')];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(count(self::$createdObjects), $objects);
    }

    public function testGetListWithStandardFilterNameLikeTwo()
    {
        $property = static::getKey();
        $params = [StandardFilter::like($property, self::$propertyValuePrefix . ' one two')];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(2, $objects);
    }
}
