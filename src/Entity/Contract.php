<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Contract extends MetaEntity
{
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
    public $code;

    /**
     * @Type("string")
     * @Generator()
     */
    public $externalCode;

    /**
     * @Type("string")
     */
    public $contractType;

    /**
     * @Type("string")
     */
    public $rewardType;

    /**
     * @Type("int")
     * @Generator()
     */
    public $rewardPercent;

    /**
     * @Type("int")
     * @Generator()
     */
    public $sum;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $moment;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
     * @Generator(type="object")
     */
    public $agent;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Agent\Organization")
     */
    public $ownAgent;

    /**
     * @Type("MoySklad\Entity\Group")
     * @Generator(type="object", anyFromExists=true)
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\State")
     */
    public $state;

    /**
     * @Type("MoySklad\Entity\Account")
     */
    public $organizationAccount;

    /**
     * @Type("MoySklad\Entity\Account")
     */
    public $agentAccount;

    /**
     * @Type("MoySklad\Entity\Rate")
     * @Generator(type="object")
     */
    public $rate;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];
}
