<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Bundle extends AbstractProduct
{
    /**
     * @Type("string")
     */
    private $paymentItemType;

    /**
     * @Type("string")
     */
    private $trackingType;

    /**
     * @Type("string")
     * @Generator()
     */
    public $article;

    /**
     * @Type("string")
     */
    public $tnved;

    /**
     * @Type("int")
     * @Generator()
     */
    public $weight;

    /**
     * @Type("int")
     * @Generator()
     */
    public $volume;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];

    /**
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     */
    public $uom;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $overhead;

    /**
     * @Type("MoySklad\Entity\Country")
     * @Generator(type="object")
     */
    public $country;

    /**
     * @Type("array<MoySklad\Entity\Component>")
     * @Generator(type="objectArray")
     */
    public $components;

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
     * @return string
     */
    public function getPaymentItemType(): string
    {
        return self::PRODUCT_PAYMENT_ITEM_TYPES[$this->paymentItemType];
    }

    /**
     * @return string
     */
    public function getTrackingType(): string
    {
        return self::TRACKING_TYPES[$this->trackingType];
    }
}
