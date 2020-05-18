<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Consignment extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    public $label;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $images;

    /**
     * @Type("MoySklad\Entity\Assortment")
     */
    public $assortment;

    /**
     * @Type("array<MoySklad\Entity\Barcode>")
     */
    public $barcodes = [];
}
