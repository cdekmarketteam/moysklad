<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\Entity\MetaEntity;

abstract class AbstractStore extends MetaEntity
{
    protected const TAX_SYSTEMS = [
        'GENERAL_TAX_SYSTEM' => 'ОСН',
        'SIMPLIFIED_TAX_SYSTEM_INCOME' => 'УСН. Доход',
        'SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME' => 'УСН. Доход-Расход',
        'UNIFIED_AGRICULTURAL_TAX' => 'ЕСХН',
        'PRESUMPTIVE_TAX_SYSTEM' => 'ЕНВД',
        'PATENT_BASED' => 'Патент',
    ];

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
    public $externalCode;

    /**
     * @Type("string")
     */
    public $address;

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
     * @Type("MoySklad\Entity\Address")
     */
    public $addressFull;
}
