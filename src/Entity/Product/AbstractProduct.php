<?php

namespace MoySklad\Entity\Product;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

abstract class AbstractProduct extends MetaEntity
{
    private const TAX_SYSTEMS = [
        'GENERAL_TAX_SYSTEM' => 'ОСН',
        'SIMPLIFIED_TAX_SYSTEM_INCOME' => 'УСН. Доход',
        'SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME' => 'УСН. Доход-Расход',
        'UNIFIED_AGRICULTURAL_TAX' => 'ЕСХН',
        'PRESUMPTIVE_TAX_SYSTEM' => 'ЕНВД',
        'PATENT_BASED' => 'Патент',
    ];

    protected const TRACKING_TYPES = [
        'NOT_TRACKED' => '',
        'TOBACCO' => 'Табак',
        'SHOES' => 'Обувь',
    ];

    protected const PRODUCT_PAYMENT_ITEM_TYPES = [
        'GOOD' => 'Товар',
        'EXCISABLE_GOOD' => 'Подакцизный товар',
        'COMPOUND_PAYMENT_ITEM' => 'Составной предмет расчета',
        'ANOTHER_PAYMENT_ITEM' => 'Иной предмет расчета',
    ];

    protected const SERVICE_PAYMENT_ITEM_TYPES = [
        'SERVICE' => 'Услуга',
        'WORK' => 'Работа',
        'PROVIDING_RID' => 'Предоставление РИД',
        'COMPOUND_PAYMENT_ITEM' => 'Составной предмет расчета',
        'ANOTHER_PAYMENT_ITEM' => 'Иной предмет расчета',
    ];

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
    public $pathName;

    /**
     * @Type("int")
     */
    public $vat;

    /**
     * @Type("int")
     */
    public $effectiveVat;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

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
     * @return string
     */
    public function getTaxSystem(): string
    {
        return self::TAX_SYSTEMS[$this->taxSystem];
    }
}
