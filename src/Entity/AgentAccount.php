<?php

namespace MoySklad\Entity;

class AgentAccount extends MetaEntity
{
    /** @var
     * \DateTime
     */
    public $updated;

    /**
     * @var bool
     */
    public $isDefault;

    /**
     * @var string
     */
    public $accountNumber;

    /**
     * @var string
     */
    public $bankName;

    /**
     * @var string
     */
    public $bic;
}
