<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class Counterparty extends MetaEntity
{
    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $created;

    /**
     * @Type("bool")
     */
    public $archived;

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
    public $email;

    /**
     * @Type("string")
     */
    public $phone;

    /**
     * @Type("string")
     */
    public $fax;

    /**
     * @Type("string")
     */
    public $actualAddress;

    /**
     * @Type("string")
     */
    public $companyType;

    /**
     * @Type("string")
     */
    public $discountCardNumber;

    /**
     * @Type("int")
     */
    public $salesAmount;

    /**
     * @Type("int")
     */
    public $bonusPoints;

    /**
     * @Type("array")
     */
    public $tags = [];

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Group")
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Account")
     */
    public $accounts;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $legalAddressFull;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $actualAddressFull;

    /**
     * @Type("MoySklad\Entity\PriceType")
     */
    public $priceType;

    /**
     * @Type("MoySklad\Entity\ContactPerson")
     */
    public $contactpersons;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $state;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $bonusProgram;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $notes;
}
