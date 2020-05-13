<?php

namespace MoySklad\Tests\Entity\Product;

use MoySklad\Tests\Entity\AbstractEntityTest;
use MoySklad\Tests\Entity\Common;
use MoySklad\Entity\Product\ProductFolder;

class ProductFolderTest extends AbstractEntityTest
{
    use Common\CreateTestTrait,
        Common\UpdateTestTrait,
        Common\GetTestTrait,
        Common\GetListAndFindOneTestTrait,
        Common\CreateMultipleTestTrait,
        Common\GetListTestTrait,
        Common\GetListWithLimitTestTrait,
        Common\GetListWithSearchTestTrait,
        Common\GetListWithStandardFilterTestTrait,
        Common\GetListWithOffsetTestTrait,
        Common\GetListWithOrderTestTrait,
        Common\GetListWithEntityFilterTestTrait;

    protected static function getClass(): string
    {
        return ProductFolder::class;
    }

    protected static function getKey(): string
    {
        return 'name';
    }
}
