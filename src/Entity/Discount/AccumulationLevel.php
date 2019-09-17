<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class AccumulationLevel
{
    /**
     * @Type("int")
     */
    public $amount;

    /**
     * @Type("int")
     */
    public $discount;
}
