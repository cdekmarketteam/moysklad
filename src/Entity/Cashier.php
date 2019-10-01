<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Cashier extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $employee;

    /**
     * @Type("MoySklad\Entity\Store\RetailStore")
     */
    public $retailStore;
}
