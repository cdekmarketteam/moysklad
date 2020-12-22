<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Status extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $status;
}