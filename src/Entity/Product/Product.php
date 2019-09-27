<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;

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
     */
    public $article;

    /**
     * @Type("string")
     */
    public $tnved;

    /**
     * @Type("int")
     */
    public $weight;

    /**
     * @Type("int")
     */
    public $volume;

    /**
     * @Type("int")
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
     * @Type("array")
     */
    public $things = [];

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     */
    public $supplier;

    /**
     * @Type("MoySklad\Entity\Country")
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\Product\Alcoholic")
     */
    public $alcoholic;

    /**
     * @Type("MoySklad\Entity\Uom")
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
     */
    public $barcodes = [];

    /**
     * @Type("array<MoySklad\Entity\Pack>")
     */
    public $packs = [];

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $images = [];

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
