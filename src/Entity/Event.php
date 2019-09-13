<?php

namespace MoySklad\Entity;

class Event extends MetaEntity
{
    /**
     * @Type("DateTime")
     */
    public $created;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $author;
}
