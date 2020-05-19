<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\Offset;
use MoySklad\Util\Param\StandardFilter;

trait GetListWithOffsetTestTrait
{
    /**
     * @dataProvider getOffsets
     * @param int $offset
     */
    public function testGetListWithOffset(int $offset)
    {
        $key = static::getKey();
        $params = [
            StandardFilter::like($key, self::$propertyValuePrefix . ' one'),
            Offset::eq($offset),
        ];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(count(self::$createdObjects) - $offset, $objects);
    }

    public function getOffsets(): array
    {
        return [
            [0],
            [1],
            [2],
            [3],
        ];
    }
}
