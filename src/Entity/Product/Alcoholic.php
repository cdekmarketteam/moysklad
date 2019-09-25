<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;

class Alcoholic
{
    /**
     * @Type("bool")
     */
    public $excise;

    /**
     * @Type("int")
     */
    public $type;

    /**
     * @Type("float")
     */
    public $strength;

    /**
     * @Type("float")
     */
    public $volume;
}
