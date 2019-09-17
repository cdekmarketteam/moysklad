<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class State extends MetaEntity
{
    /**
     * @Type("int")
     */
    public $color;

    /**
     * @Type("string")
     */
    public $stateType;
}
