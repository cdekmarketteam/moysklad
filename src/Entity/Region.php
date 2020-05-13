<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Region extends MetaEntity
{
    /**
     * @Type("int")
     */
    public $version;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
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
