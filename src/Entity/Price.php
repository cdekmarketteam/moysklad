<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Price
{
    /**
     * @Type("int")
     * @Generator()
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\PriceType")
     * @Generator(type="object")
     */
    public $priceType;

    /**
     * @Type("MoySklad\Entity\Currency")
     */
    public $currency;
}
