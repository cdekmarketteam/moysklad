<?php

namespace MoySklad\Tests\Entity\Common;

use MoySklad\Util\Param\Search;

trait GetListWithSearchTestTrait
{
    public function testGetListWithSearch()
    {
        $params = [Search::eq(self::$propertyValuePrefix . ' one')];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertGreaterThanOrEqual(count(self::$createdObjects), $objects);
    }

    public function testGetListWithSearchNotFound()
    {
        $params = [Search::eq('invalidString' . time())];
        $objects = self::getClient()->getList($params)->rows;

        $this->assertCount(0, $objects);
    }
}
