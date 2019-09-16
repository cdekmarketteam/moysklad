<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

final class Context
{
    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $employee;
}
