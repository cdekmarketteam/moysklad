<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Product extends AbstractProduct
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
     */
    public $syncId;

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
     * @Type("int")
     * @Generator()
     */
    public $minimumBalance;

    /**
     * @Type("int")
     */
    public $variantsCount;

    /**
     * @Type("bool")
     */
    public $tobacco;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $weighed;

    /**
     * @Type("bool")
     */
    public $isSerialTrackable;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];

    /**
     * @Type("array<string>")
     */
    public $things = [];

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     * @Generator(type="object")
     */
    public $supplier;

    /**
     * @Type("MoySklad\Entity\Country")
     * @Generator(type="object")
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\Product\Alcoholic")
     */
    public $alcoholic;

    /**
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     */
    public $uom;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $buyPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $minPrice;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     * @Generator(type="objectArray", oneForEachProperty=true)
     */
    public $barcodes = [];

    /**
     * @Type("array<MoySklad\Entity\Pack>")
     * @Generator(type="objectArray")
     */
    public $packs = [];

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $images;

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
