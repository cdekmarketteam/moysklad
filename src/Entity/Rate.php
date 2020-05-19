<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Rate
{
    /**
     * @Type("int")
     * @Generator()
     */
    public $value;

    /**
     * @Type("MoySklad\Entity\Currency")
     * @Generator(type="object")
     */
    public $currency;
}
