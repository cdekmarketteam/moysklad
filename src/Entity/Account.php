<?php

namespace MoySklad\Entity;

class Account extends MetaEntity
{
    /**
     * @Type("DateTime")
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
