<?php

namespace MoySklad\Entity\Discount;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class BonusProgram extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("bool")
     */
    public $active;

    /**
     * @Type("bool")
     */
    public $allProducts;

    /**
     * @Type("array<string>")
     */
    public $agentTags = [];

    /**
     * @Type("int")
     */
    public $earnRateRoublesToPoint;

    /**
     * @Type("int")
     */
    public $spendRatePointsToRouble;

    /**
     * @Type("int")
     */
    public $maxPaidRatePercents;
}
