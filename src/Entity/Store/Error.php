<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class Error
{
    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $message;
}
