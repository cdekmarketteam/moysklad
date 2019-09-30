<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Rate
{
    /**
     * @Type("int")
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\Currency")
     */
    public $currency;
}
