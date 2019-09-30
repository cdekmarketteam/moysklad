<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class CompanySettings extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $discountStrategy;

    /**
     * @Type("MoySklad\Entity\Currency")
     */
    public $currency;

    /**
     * @Type("array<MoySklad\Entity\PriceType>")
     */
    public $priceTypes = [];
}
