<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Attribute extends MetaEntity //@todo create deserializer
{
    /**
     * @var mixed
     */
    public $value;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $type;

    /**
     * @Type("bool")
     */
    public $required;
}
