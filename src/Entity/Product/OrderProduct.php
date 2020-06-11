<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Entity\OrderAssortment;
use MoySklad\Entity\Pack;

class OrderProduct extends MetaEntity
{
    /**
     * @Type("float")
     */
    public $quantity;

    /**
     * Базовая цена в копейках
     * @Type("int")
     */
    public $price;

    /**
     * Скидка в процентах
     * @Type("float")
     */
    public $discount;

    /**
     * НДС, которым облагается текущая позиция
     * @Type("float")
     */
    public $vat;

    /**
     * @Type("MoySklad\Entity\OrderAssortment")
     * @var OrderAssortment
     */
    public $assortment;

    /**
     * @Type("MoySklad\Entity\Pack")
     * @var Pack
     */
    public $pack;

    /**
     * @Type("int")
     */
    public $shipped;

    /**
     * @Type("float")
     */
    public $reserve;

    /**
     * @Type("string")
     */
    public $taxSystem;
}
