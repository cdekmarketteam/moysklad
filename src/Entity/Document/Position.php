<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class Position extends MetaEntity
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
     * @Generator(type="object")
     */
    public $assortment;

    /**
     * @Type("MoySklad\Entity\Pack")
     */
    public $pack;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $shipped;

    /**
     * @Type("float")
     */
    public $reserve;

    /**
     * @Type("string")
     * @Generator(
     *     values={
     *         "GENERAL_TAX_SYSTEM",
     *         "SIMPLIFIED_TAX_SYSTEM_INCOME",
     *         "SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME",
     *         "UNIFIED_AGRICULTURAL_TAX",
     *         "PRESUMPTIVE_TAX_SYSTEM",
     *         "PATENT_BASED"
     *     }
     * )
     */
    public $taxSystem;
}
