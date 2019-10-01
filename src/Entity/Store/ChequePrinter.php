<?php

namespace MoySklad\Entity\Store;

use JMS\Serializer\Annotation\Type;

class ChequePrinter
{
    /**
     * @Type("string")
     */
    public $vendor;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $serial;

    /**
     * @Type("string")
     */
    public $fiscalDataVersion;

    /**
     * @Type("string")
     */
    public $firmwareVersion;

    /**
     * @Type("MoySklad\Entity\Store\Driver")
     */
    public $driver;

    /**
     * @Type("MoySklad\Entity\Store\FiscalHoarder")
     */
    public $fiscalMemory;
}
