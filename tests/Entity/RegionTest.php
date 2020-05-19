<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\AbstractApiTest;
use MoySklad\Client\RegionClient;
use MoySklad\Entity\Region;

class RegionTest extends AbstractApiTest
{
    public function testGetList()
    {
        $this->assertGreaterThanOrEqual(1, count($this->getClient()->getList()->rows));
    }

    public function testGet()
    {
        $regions = $this->getClient()->getList()->rows;
        $this->assertInstanceOf(Region::class, $regions[0]);

        $region = $regions[0];
        $receivedRegion = $this->getClient()->get($region->id);

        $this->assertEquals($region->id, $receivedRegion->id);
        $this->assertEquals($region->name, $receivedRegion->name);
        $this->assertEquals($region->code, $receivedRegion->code);
        $this->assertEquals($region->externalCode, $receivedRegion->externalCode);
    }

    private function getClient(): RegionClient
    {
        return self::$api->entity()->region();
    }
}
