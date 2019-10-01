<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class SpecialPrice
{
    /**
     * @Type("int")
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\PriceType")
     */
    public $priceType;
}
