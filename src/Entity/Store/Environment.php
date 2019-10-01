<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class Environment
{
    /**
     * @Type("string")
     */
    public $device;

    /**
     * @Type("string")
     */
    public $os;

    /**
     * @Type("MoySklad\Entity\Store\Software")
     */
    public $software;

    /**
     * @Type("MoySklad\Entity\Store\ChequePrinter")
     */
    public $chequePrinter;

    /**
     * @Type("MoySklad\Entity\Store\PaymentTerminal")
     */
    public $paymentTerminal;
}
