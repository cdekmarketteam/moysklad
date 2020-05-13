<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Component extends MetaEntity
{
    /**
     * @Type("int")
     * @Generator()
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Product\Product")
     * @Generator(type="object")
     */
    public $assortment;
}
