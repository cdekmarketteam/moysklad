<?php

namespace MoySklad\Entity;

class Country extends MetaEntity
{
    /**
     * @Type("DateTime")
     */
    public $updated;

    /**
     * @Type("bool")
     */
    public $shared;

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
    public $code;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     */
    public $group;
}
