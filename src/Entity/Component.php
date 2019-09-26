<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Component extends MetaEntity
{
    /**
     * @Type("int")
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Assortment")
     */
    public $assortment;
}
