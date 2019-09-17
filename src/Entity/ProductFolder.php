<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class ProductFolder extends MetaEntity
{
    public const TAX_SYSTEM = [
        'GENERAL_TAX_SYSTEM' => 'ОСН',
        'SIMPLIFIED_TAX_SYSTEM_INCOME' => 'УСН. Доход',
        'SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME' => 'УСН. Доход-Расход',
        'UNIFIED_AGRICULTURAL_TAX' => 'ЕСХН',
        'PRESUMPTIVE_TAX_SYSTEM' => 'ЕНВД',
        'PATENT_BASED' => 'Патент',
    ];

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
    public $pathName;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    private $taxSystem;

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
     * @Type("MoySklad\Entity\Agent\Group")
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Agent\ProductFolder")
     */
    public $productFolder;

    /**
     * @return string
     */
    public function getTaxSystem(): string
    {
        return self::TAX_SYSTEM[$this->taxSystem];
    }
}
