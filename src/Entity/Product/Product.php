<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\StockTrait;
use MoySklad\Entity\Uom;
use MoySklad\Util\Object\Annotation\Generator;

class Product extends AbstractProduct
{
    use StockTrait;

    /**
     * Данное поле актуально при создании товара, так что ему нужен генератор для тестов
     *
     * @Type("string")
     * @Generator()
     */
    public $article;

    /**
     * Данное поле требуется при создании товара, так что ему нужен генератор для тестов
     *
     * @Type("MoySklad\Entity\Uom")
     * @Generator(type="object")
     * @var Uom
     */
    public $uom;

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
