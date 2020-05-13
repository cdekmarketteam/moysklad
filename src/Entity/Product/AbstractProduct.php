<?php

namespace MoySklad\Entity\Product;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

abstract class AbstractProduct extends MetaEntity
{
    private const TAX_SYSTEMS = [
        'GENERAL_TAX_SYSTEM'                   => 'ОСН',
        'SIMPLIFIED_TAX_SYSTEM_INCOME'         => 'УСН. Доход',
        'SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME' => 'УСН. Доход-Расход',
        'UNIFIED_AGRICULTURAL_TAX'             => 'ЕСХН',
        'PRESUMPTIVE_TAX_SYSTEM'               => 'ЕНВД',
        'PATENT_BASED'                         => 'Патент',
    ];

    protected const TRACKING_TYPES = [
        'NOT_TRACKED' => '',
        'TOBACCO'     => 'Табак',
        'SHOES'       => 'Обувь',
    ];

    protected const PRODUCT_PAYMENT_ITEM_TYPES = [
        'GOOD'                  => 'Товар',
        'EXCISABLE_GOOD'        => 'Подакцизный товар',
        'COMPOUND_PAYMENT_ITEM' => 'Составной предмет расчета',
        'ANOTHER_PAYMENT_ITEM'  => 'Иной предмет расчета',
    ];

    protected const SERVICE_PAYMENT_ITEM_TYPES = [
        'SERVICE'               => 'Услуга',
        'WORK'                  => 'Работа',
        'PROVIDING_RID'         => 'Предоставление РИД',
        'COMPOUND_PAYMENT_ITEM' => 'Составной предмет расчета',
        'ANOTHER_PAYMENT_ITEM'  => 'Иной предмет расчета',
    ];

    /**
     * @Type("string")
     * Generator(
     *     values={
     *         "TAX_SYSTEM_SAME_AS_GROUP",
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

    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $description;

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
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("int")
     * @Generator(min=1, max=100)
     */
    public $vat;

    /**
     * @Type("int")
     */
    public $effectiveVat;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object", anyFromExists=true)
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
        return isset(self::TAX_SYSTEMS[$this->taxSystem]) ? self::TAX_SYSTEMS[$this->taxSystem] : '';
    }
}
