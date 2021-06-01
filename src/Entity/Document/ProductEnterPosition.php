<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\Entity\Country;

/**
 * Позиция оприходования
 */
class ProductEnterPosition extends MetaEntity
{
    /**
     * @Type("int")
     * @Generator(min=1, max=100)
     */
    public $quantity;

    /**
     * @Type("int")
     * @Generator()
     */
    public $price;

    /**
     * @Type("string")
     */
    public $gtd;

    /**
     * @Type("MoySklad\Entity\Country")
     * @Generator(type="object")
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\MetaEntity")
     */
    public $assortment;

    /**
     * @Type("MoySklad\Entity\Pack")
     */
    public $pack;

    /**
     * @Type("array")
     * @Generator()
     */
    public $things;

    /**
     * @Type("string")
     */
    public $reason;
}
