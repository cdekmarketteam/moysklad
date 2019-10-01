<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class State
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $lastCheckMoment;

    /**
     * @Type("MoySklad\Entity\Store\Sync")
     */
    public $sync;

    /**
     * @Type("MoySklad\Entity\Store\FiscalMemory")
     */
    public $fiscalMemory;

    /**
     * @Type("MoySklad\Entity\Store\PaymentTerminal")
     */
    public $paymentTerminal;
}
