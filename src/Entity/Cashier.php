<?php

namespace MoySklad\Entity;

class Cashier extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $employee;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $retailStore;
}
