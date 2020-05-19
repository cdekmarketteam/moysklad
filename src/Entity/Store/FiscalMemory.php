<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class FiscalMemory
{
    /**
     * @Type("int")
     */
    public $notSendDocCount;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $notSendFirstDocMoment;

    /**
     * @Type("MoySklad\Entity\Store\Error")
     */
    public $error;
}
