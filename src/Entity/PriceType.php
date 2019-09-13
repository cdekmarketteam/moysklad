<?php

namespace MoySklad\Entity;

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