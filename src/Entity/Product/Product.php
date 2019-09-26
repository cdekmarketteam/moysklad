<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;

class Product extends AbstractProduct
{
    /**
     * @Type("string")
     */
    private $trackingType;

    /**
     * @Type("string")
     */
    private $paymentItemType;

    /**
     * @Type("string")
     */
    private $taxSystem;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("string")
     */
    public $pathName;

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
    public $vat;

    /**
     * @Type("int")
     */
    public $effectiveVat;

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
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

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
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Product\ProductFolder")
     */
    public $productFolder;

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
    public $minPrice;

    /**
     * @Type("MoySklad\Entity\Price")
     */
    public $buyPrice;

    /**
     * @Type("array<MoySklad\Entity\Price>")
     */
    public $salePrices = [];

    /**
     * @Type("array<MoySklad\Entity\Pack>")
     */
    public $packs = [];

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes = [];

    /**
     * @Type("array<MoySklad\Entity\Image>")
     */
    public $images = [];

    /**
     * @Type("array")
     */
    public $attributes = [];

    /**
     * @Type("array")
     */
    public $things = [];

    /**
     * @return string
     */
    public function getTrackingType(): string
    {
        return self::TRACKING_TYPES[$this->trackingType];
    }

    /**
     * @return string
     */
    public function getPaymentItemType(): string
    {
        return self::PAYMENT_ITEM_TYPES[$this->paymentItemType];
    }

    /**
     * @return string
     */
    public function getTaxSystem(): string
    {
        return self::TAX_SYSTEMS[$this->taxSystem];
    }
}
