<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\AbstractApiTest;
use MoySklad\Client\GroupClient;
use MoySklad\Entity\Group;

class GroupTest extends AbstractApiTest
{
    public function testGetList()
    {
        $this->assertGreaterThanOrEqual(1, count($this->getClient()->getList()->rows));
        $group = $this->getClient()->getList()->rows[0];
        $this->assertInstanceOf(Group::class, $group);
        $this->assertNotEmpty($group->name);
    }

    private function getClient(): GroupClient
    {
        return self::$api->entity()->group();
    }
}
