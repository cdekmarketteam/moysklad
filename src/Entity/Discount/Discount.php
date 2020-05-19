<?php

namespace MoySklad\Entity\Discount;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Discount extends MetaEntity
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $active;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $allProducts;

    /**
     * @Type("array<string>")
     * @Generator(type="stringArray")
     */
    public $agentTags = [];
}
