<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class State extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $stateType;

    /**
     * @Type("string")
     */
    public $entityType;

    /**
     * @Type("int")
     */
    public $color;
}
