<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class Sync
{
    /**
     * @Type("string")
     */
    public $message;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $lastAttempMoment;
}
