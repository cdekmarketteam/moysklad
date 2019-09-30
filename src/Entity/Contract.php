<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Contract extends MetaEntity
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
    public $contractType;

    /**
     * @Type("string")
     */
    public $rewardType;

    /**
     * @Type("int")
     */
    public $rewardPercent;

    /**
     * @Type("int")
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
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $moment;

    /**
     * @Type("MoySklad\Entity\Agent\Counterparty")
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
     */
    public $rate;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];
}
