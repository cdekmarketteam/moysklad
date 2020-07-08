<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

/**
 * Класс для получения отчёта остатков по складами
 */
class ListByStocks extends ListEntity
{
    /**
     * @Type("array<MoySklad\Entity\Product\ByStoreProductStock>")
     */
    public $rows;
}
