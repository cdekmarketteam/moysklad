<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Employee extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $uid;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $firstName;

    /**
     * @Type("string")
     * @Generator()
     */
    public $middleName;

    /**
     * @Type("string")
     * @Generator()
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
     * @Generator()
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

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;
}
