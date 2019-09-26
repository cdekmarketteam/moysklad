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
     * @Type("MoySklad\Entity\MetaEntity") //@todo create Assortment entity
     */
    public $assortment;
}
