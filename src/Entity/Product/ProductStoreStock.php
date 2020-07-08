<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;

class ProductStoreStock extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("float")
     */
    public $stock;

    /**
     * @Type("float")
     */
    public $inTransit;

    /**
     * @Type("float")
     */
    public $reserve;
}