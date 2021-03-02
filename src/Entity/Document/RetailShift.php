<?php

namespace MoySklad\Entity\Document;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;
use MoySklad\Util\Object\Annotation\Generator;

class RetailShift extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("int")
     */
    public $accountId;

    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $deleted;

    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

    /**
     * @Type("string")
     * @Generator()
     */
    public $description;

    /**
     * @Type("string")
     * @Generator()
     */
    public $externalCode;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     * @Generator(type="datetime")
     */
    public $moment;

    /**
     * @Type("bool")
     */
    public $vatIncluded;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $vatEnabled;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object", anyFromExists=true)
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     * @Generator(type="object", anyFromExists=true)
     */
    public $organization;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     * @Generator(type="object")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\Store\Store")
     * @Generator(type="object")
     */
    public $store;

    /**
     * @Type("MoySklad\Entity\Contract")
     */
    public $contract;

    /**
     * @Type("MoySklad\Entity\Account")
     */
    public $organizationAccount;

    /**
     * @Type("MoySklad\Entity\Account")
     */
    public $agentAccount;

    /**
     * @Type("array<MoySklad\Entity\Document\CustomerOrderAttribute>")
     */
    public $attributes = [];

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $created;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $closeDate;

    /**
     * @Type("float")
     */
    public $proceedsNoCash;

    /**
     * @Type("float")
     */
    public $proceedsCash;

    /**
     * @Type("float")
     */
    public $receivedNoCash;

    /**
     * @Type("float")
     */
    public $receivedCash;

    /**
     * @Type("MoySklad\Entity\Store\RetailStore")
     */
    public $retailStore;
}