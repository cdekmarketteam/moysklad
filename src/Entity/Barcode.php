<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Barcode
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
