<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class PaymentTerminal
{
    /**
     * @Type("string")
     */
    public $acquiringType;
}
