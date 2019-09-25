<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Pack
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("int")
     */
    public $quantity;

    /**
     * @Type("MoySklad\Entity\Uom")
     */
    public $uom;

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes;
}
