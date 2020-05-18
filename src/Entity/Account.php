<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Account extends MetaEntity
{
    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $updated;

    /**
     * @Type("bool")
     */
    public $isDefault;

    /**
     * @Type("string")
     */
    public $accountNumber;

    /**
     * @Type("string")
     */
    public $bankName;

    /**
     * @Type("string")
     */
    public $bankLocation;

    /**
     * @Type("string")
     */
    public $correspondentAccount;

    /**
     * @Type("string")
     */
    public $bic;
}
