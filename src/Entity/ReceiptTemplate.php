<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class ReceiptTemplate extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $header;

    /**
     * @Type("string")
     */
    public $footer;
}
