<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class TaskNote extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $text;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $moment;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $author;
}
