<?php

namespace MoySklad\Tests\Entity;

use MoySklad\Tests\Entity\Common;
use MoySklad\Entity\Project;

class ProjectTest extends AbstractEntityTest
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
        return Project::class;
    }

    protected static function getKey(): string
    {
        return 'name';
    }
}
