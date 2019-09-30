<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class CustomEntity extends MetaEntity
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
}
