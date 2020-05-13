<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class ContactPerson extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
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
