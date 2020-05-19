<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

/**
 * Trait StockTrait
 * @package MoySklad\Entity
 *
 * Трейт сущностей, которые хранятся на складе - товары и варианты
 *
 * @copyright CDEK.MARKET, Ltd. (ООО «СДЭК.МАРКЕТ» http://cdek.market)
 * @project ms-lib
 * @date 19.05.2020 14:32
 * @author Viktor.Fursenko
 */
trait StockTrait
{
    /**
     * @Type("float")
     * @Generator()
     */
    public $stock;

    /**
     * @Type("float")
     * @Generator()
     */
    public $inTransit;

    /**
     * @Type("float")
     * @Generator()
     */
    public $reserve;


    /**
     * @Type("float")
     * @Generator()
     */
    public $quantity;
}