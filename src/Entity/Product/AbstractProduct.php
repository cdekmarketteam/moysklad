<?php

namespace MoySklad\Entity\Product;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

abstract class AbstractProduct extends MetaEntity
{
    public const TAX_SYSTEMS = [
        'GENERAL_TAX_SYSTEM' => 'ОСН',
        'SIMPLIFIED_TAX_SYSTEM_INCOME' => 'УСН. Доход',
        'SIMPLIFIED_TAX_SYSTEM_INCOME_OUTCOME' => 'УСН. Доход-Расход',
        'UNIFIED_AGRICULTURAL_TAX' => 'ЕСХН',
        'PRESUMPTIVE_TAX_SYSTEM' => 'ЕНВД',
        'PATENT_BASED' => 'Патент',
    ];

    public const TRACKING_TYPES = [
        'NOT_TRACKED' => '',
        'TOBACCO' => 'Табак',
        'SHOES' => 'Обувь',
    ];

    public const PAYMENT_ITEM_TYPES = [
        'GOOD' => 'Товар',
        'EXCISABLE_GOOD' => 'Подакцизный товар',
        'COMPOUND_PAYMENT_ITEM' => 'Составной предмет расчета',
        'ANOTHER_PAYMENT_ITEM' => 'Иной предмет расчета',
    ];
}
