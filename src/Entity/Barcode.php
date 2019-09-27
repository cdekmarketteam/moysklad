<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Barcode //@todo create serializer
{
    /**
     * @Type("string")
     */
    public $type;

    /**
     * @Type("int")
     */
    public $value;
}
