<?php

namespace MoySklad\Tests\Entity\Discount;

use MoySklad\Tests\AbstractApiTest;
use MoySklad\Client\DiscountClient;
use MoySklad\Entity\Discount\Discount;

class DiscountTest extends AbstractApiTest
{
    public function testGetList()
    {
        $this->assertGreaterThanOrEqual(1, count($this->getClient()->getList()->rows));
        $discount = $this->getClient()->getList()->rows[0];
        $this->assertInstanceOf(Discount::class, $discount);
        $this->assertNotEmpty($discount->name);
    }

    private function getClient(): DiscountClient
    {
        return self::$api->entity()->discount();
    }
}
