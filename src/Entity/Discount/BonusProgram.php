<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class BonusProgram extends Discount
{
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
