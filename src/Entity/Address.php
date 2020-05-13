<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Address
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $postalCode;

    /**
     * @Type("string")
     * @Generator()
     */
    public $city;

    /**
     * @Type("string")
     * @Generator()
     */
    public $street;

    /**
     * @Type("string")
     * @Generator()
     */
    public $house;

    /**
     * @Type("string")
     * @Generator()
     */
    public $apartment;

    /**
     * @Type("string")
     * @Generator()
     */
    public $addInfo;

    /**
     * @Type("string")
     * @Generator()
     */
    public $comment;

    /**
     * @Type("MoySklad\Entity\Country")
     * @Generator(type="object")
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\Region")
     * @Generator(type="object", anyFromExists=true)
     */
    public $region;
}
