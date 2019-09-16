<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Address extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $postalCode;

    /**
     * @Type("string")
     */
    public $city;

    /**
     * @Type("string")
     */
    public $street;

    /**
     * @Type("string")
     */
    public $house;

    /**
     * @Type("string")
     */
    public $apartment;

    /**
     * @Type("string")
     */
    public $addInfo;

    /**
     * @Type("string")
     */
    public $comment;

    /**
     * @Type("MoySklad\Entity\Country")
     */
    public $country;

    /**
     * @Type("MoySklad\Entity\Region")
     */
    public $region;
}
