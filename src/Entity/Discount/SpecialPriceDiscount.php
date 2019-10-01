<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class SpecialPriceDiscount extends Discount
{
    /**
     * @Type("int")
     */
    public $discount;

    /**
     * @Type("MoySklad\Entity\Discount\SpecialPrice")
     */
    public $specialPrice;

    /**
     * @Type("array<MoySklad\Entity\Product\ProductFolder>")
     */
    public $productFolders = [];

    /**
     * @Type("array<MoySklad\Entity\MetaEntity>")
     */
    public $assortment = [];
}
