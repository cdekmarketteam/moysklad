<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Variant extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("array")
     */
    public $things = [];

    /**
     * @Type(MoySklad\Entity\Product\Product")
     */
    public $product;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $buyPrice;

    /**
     * @Type(MoySklad\Entity\ListEntity")
     */
    public $images;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes = [];

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $characteristics = [];
}
