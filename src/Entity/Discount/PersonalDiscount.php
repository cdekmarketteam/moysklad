<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class PersonalDiscount extends Discount
{
    /**
     * @Type("array<MoySklad\Entity\Product\ProductFolder>")
     */
    public $productFolders = [];

    /**
     * @Type("array<MoySklad\Entity\MetaEntity>")
     */
    public $assortment = [];
}
