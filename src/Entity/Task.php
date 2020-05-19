<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Task extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("bool")
     */
    public $done;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $created;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $dueToDate;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $completed;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $author;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $assignee;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $implementer;

    /**
     * @Type("MoySklad\Entity\Agent\Agent")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\MetaEntity") //@todo add Document supply type
     */
    public $operation;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $notes;
}
