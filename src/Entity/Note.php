<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Note extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v.v'>")
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
