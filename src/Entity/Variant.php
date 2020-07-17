<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Variant extends MetaEntity
{
    use StockTrait;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("string")
     * @Generator()
     */
    public $externalCode;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("array<string>")
     */
    public $things = [];

    /**
     * @Type("MoySklad\Entity\Product\Product")
     * @Generator(type="object")
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
     * @Type("MoySklad\Entity\ListEntity")
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
     * @Type("array<MoySklad\Entity\Characteristic>")
     * @Generator(type="objectArray")
     */
    public $characteristics = [];
}
