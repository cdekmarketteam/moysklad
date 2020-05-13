<?php

namespace MoySklad\Entity\Product;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Alcoholic
{
    /**
     * @Type("bool")
     * @Generator()
     */
    public $excise;

    /**
     * @Type("int")
     * @Generator()
     */
    public $type;

    /**
     * @Type("float")
     * @Generator()
     */
    public $strength;

    /**
     * @Type("float")
     * @Generator()
     */
    public $volume;
}
