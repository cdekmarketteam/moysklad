<?php

namespace MoySklad\Tests\Entity\Product;

use MoySklad\Tests\Entity\AbstractEntityTest;
use MoySklad\Tests\Entity\Common;
use MoySklad\Entity\Product\Bundle;

class BundleTest //extends AbstractEntityTest
{
    use Common\CreateTestTrait
//        Common\UpdateTestTrait,
//        Common\GetTestTrait,
//        Common\GetListAndFindOneTestTrait,
//        Common\CreateMultipleTestTrait,
//        Common\GetListTestTrait,
//        Common\GetListWithLimitTestTrait,
//        Common\GetListWithSearchTestTrait,
//        Common\GetListWithStandardFilterTestTrait,
//        Common\GetListWithOffsetTestTrait,
//        Common\GetListWithOrderTestTrait,
//        Common\GetListWithEntityFilterTestTrait
        ;
//"components" : {
//"meta" : {
//"href" : "https://online.moysklad.ru/api/remap/1.2/entity/bundle/f6cec9fd-9481-11ea-0a80-04c7003262e0/components",
//"type" : "bundlecomponent",
//"mediaType" : "application/json",
//"size" : 1,
//"limit" : 1000,
//"offset" : 0
//}
//}

    protected static function getClass(): string
    {
        return Bundle::class;
    }

    protected static function getKey(): string
    {
        return 'name';
    }
}
