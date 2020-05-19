<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class State extends MetaEntity
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $stateType;

    /**
     * @Type("string")
     * @Generator()
     */
    public $entityType;

    /**
     * @Type("int")
     * @Generator()
     */
    public $color;
}
