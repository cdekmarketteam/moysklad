<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Barcode
{
    /**
     * @Type("string")
     * @Generator(type="int", min=1000000000000, max=9999999999999)
     */
    public $ean13;

    /**
     * @Type("string")
     * @Generator(type="int", min=10000000, max=99999999)
     */
    public $ean8;

    /**
     * @Type("string")
     * @Generator()
     */
    public $code128;

    /**
     * @Type("string")
     * @Generator(type="int", min=10000000000000, max=99999999999999)
     */
    public $gtin;
}
