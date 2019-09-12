<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\AgentAccount;

class Counterparty extends Agent
{
    /** @var string */
    public $code;

    /** @var string */
    public $syncId;

    /** @var string */
    public $description;

    /** @var bool */
    public $archived;

    /** @var string */
    public $legalTitle;

    /** @var string */
    public $legalAddress;

    /** @var string */
    public $inn;

    /** @var string */
    public $kpp;

    /** @var string */
    public $ogrn;

    /** @var string */
    public $ogrnip;

    /** @var string */
    public $okpo;

    /** @var string */
    public $certificateNumber;

    /** @var \DateTime */
    public $certificateDate;

    /** @var string */
    public $email;

    /** @var string */
    public $phone;

    /** @var string */
    public $fax;

    /** @var string */
    public $actualAddress;

    /** @var int */
    public $salesAmount;

    /** @var string */
    public $discountCardNumber;

    /** @var string  */
    public $companyType; //@todo make this field is enum

    /** @var AgentAccount[] */
    public $accounts = [];

    /** @var string[] */
    public $tags = [];

    /** @var DiscountData[] */
    public $discounts = [];

    /** @var ContactPerson[] */
    public $contactpersons = [];

    /** @var Note[] */
    public $notes = [];

    /** @var State */
    public $state;

    /** @var PriceType */
    public $priceType;

    /**
     * @param array $data
     * @return Counterparty
     */
    public static function createFromArray(array $data): self
    {
        $entity = new self();
        $entity->code = $data['code'];
        $entity->syncId = $data['code'];
        $entity->description = $data['code'];
        $entity->archived = $data['code'];
        $entity->legalTitle = $data['code'];
        $entity->legalAddress = $data['code'];
        $entity->inn = $data['code'];
        $entity->kpp = $data['code'];
        $entity->ogrn = $data['code'];
        $entity->ogrnip = $data['code'];
        $entity->okpo = $data['code'];
        $entity->certificateNumber = $data['code'];
        $entity->certificateDate = $data['code'];
        $entity->email = $data['code'];
        $entity->phone = $data['code'];
        $entity->fax = $data['code'];
        $entity->actualAddress = $data['code'];
        $entity->salesAmount = $data['code'];
        $entity->discountCardNumber = $data['code'];

        return $entity;
    }
}
