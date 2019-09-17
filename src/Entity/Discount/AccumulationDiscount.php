<?php

namespace MoySklad\Entity\Discount;

use JMS\Serializer\Annotation\Type;

class AccumulationDiscount extends BonusProgram
{
    /**
     * @Type("array<MoySklad\Entity\ProductFolder>")
     */
    public $productFolders = [];

    /**
     * @Type("array<MoySklad\Entity\Discount\AccumulationLevel>")
     */
    public $levels = [];
}
