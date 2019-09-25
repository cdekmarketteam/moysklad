<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Currency extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $fullName;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $isoCode;

    /**
     * @Type("string")
     */
    public $rateUpdateType;

    /**
     * @Type("float")
     */
    public $rate;

    /**
     * @Type("int")
     */
    public $multiplicity;

    /**
     * @Type("bool")
     */
    public $indirect;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("bool")
     */
    public $system;

    /**
     * @Type("bool")
     */
    public $default;

    /**
     * @Type("MoySklad\Entity\Unit")
     */
    public $majorUnit;

    /**
     * @Type("MoySklad\Entity\Unit")
     */
    public $minorUnit;
}
