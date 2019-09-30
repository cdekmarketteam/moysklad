<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Store extends MetaEntity
{
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
     * @Type("string")
     */
    public $address;

    /**
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $addressFull;

    /**
     * @Type("MoySklad\Entity\Store")
     */
    public $parent;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];
}
