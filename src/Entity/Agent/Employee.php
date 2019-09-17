<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class Employee extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $uid;

    /**
     * @Type("string")
     */
    public $firstName;

    /**
     * @Type("string")
     */
    public $middleName;

    /**
     * @Type("string")
     */
    public $lastName;

    /**
     * @Type("string")
     */
    public $fullName;

    /**
     * @Type("string")
     */
    public $shortFio;

    /**
     * @Type("string")
     */
    public $position;

    /**
     * @Type("MoySklad\Entity\Cashier")
     */
    public $cashier;

    /**
     * @Type("MoySklad\Entity\Image")
     */
    public $image;
}
