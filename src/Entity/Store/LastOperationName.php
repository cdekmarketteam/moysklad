<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class LastOperationName
{
    /**
     * @Type("string")
     */
    public $entity;

    /**
     * @Type("string")
     */
    public $name;
}
