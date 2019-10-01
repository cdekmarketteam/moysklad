<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class Software
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $vendor;

    /**
     * @Type("string")
     */
    public $version;
}
