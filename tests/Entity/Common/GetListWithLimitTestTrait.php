<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\Limit;

trait GetListWithLimitTestTrait
{
    public function testGetListWithLimit()
    {
        $limit = count(self::$createdObjects);
        $params = [Limit::eq($limit)];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount($limit, $objects);
    }
}
