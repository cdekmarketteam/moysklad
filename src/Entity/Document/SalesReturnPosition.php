<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class SalesReturnPosition extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("int")
     */
    public $accountId;

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
     * @Type("int")
     * @Generator(type="negativeInt")
     */
    public $discount;

    /**
     * @Type("int")
     * @Generator(min=1, max=100)
     */
    public $vat;

    /**
     * @Type("MoySklad\Entity\Product\Product")
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
     * @Type("int")
     * @Generator()
     */
    public $cost;
}
