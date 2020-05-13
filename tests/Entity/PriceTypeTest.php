<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\Entity\Common;
use MoySklad\Entity\PriceType;

class PriceTypeTest extends AbstractEntityTest
{
    use Common\CreateTestTrait,
        Common\UpdateTestTrait,
        Common\GetTestTrait,
        Common\GetListAndFindOneTestTrait,
        Common\CreateMultipleTestTrait,
        Common\GetListTestTrait;

    protected static function getClass(): string
    {
        return PriceType::class;
    }

    protected static function getKey(): string
    {
        return 'name';
    }
}
