<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class PriceType extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $externalCode;
}