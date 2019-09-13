<?php

namespace MoySklad\Entity;

class Region extends MetaEntity
{
    /**
     * @Type("int")
     */
    public $version;

    /**
     * @Type("DateTime")
     */
    public $updated;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $externalCode;
}
