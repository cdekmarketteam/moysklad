<?php

namespace MoySklad\Entity;


class AgentAccount extends Entity
{
    /** @var string */
    private $updated;

    /** @var bool */
    private $isDefault;

    /** @var string */
    private $accountNumber;

    /** @var string */
    private $bankName;

    /** @var string */
    private $bankLocation;

    /** @var string */
    private $correspondentAccount;

    /** @var string */
    private $bic;

    /** @var Agent */
    private $agent;

    public function __construct(array $data)
    {
        $this->updated = $data['updated'];
        $this->isDefault = $data['is_default'];
        $this->accountNumber = $data['account_number'];
        $this->bankName = $data['bank_name'];
        $this->bankLocation = $data['bank_location'];
        $this->correspondentAccount = $data['correspondent_account'];
        $this->bic = $data['bic'];
        $this->agent = new Agent($data['agent']);
    }
}
