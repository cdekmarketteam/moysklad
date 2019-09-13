<?php

namespace MoySklad\Entity;

class ContactPerson extends MetaEntity
{
    /**
     * @Type("DateTime")
     */
    public $updated;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    public $email;

    /**
     * @Type("string")
     */
    public $phone;

    /**
     * @Type("string")
     */
    public $position;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     */
    public $agent;
}
