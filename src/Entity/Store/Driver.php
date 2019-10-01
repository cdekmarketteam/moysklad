<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class Driver
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $version;
}
