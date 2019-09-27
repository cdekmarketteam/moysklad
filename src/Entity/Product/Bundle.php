<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;

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
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];

    /**
     * @Type("MoySklad\Entity\Uom")
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
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $components;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $images = [];

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
