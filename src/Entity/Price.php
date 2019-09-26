<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Price
{
    /**
     * @Type("int")
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\PriceType")
     */
    public $priceType;

    /**
     * @Type("MoySklad\Entity\Currency")
     */
    public $currency;
}
