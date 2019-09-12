<?php

namespace MoySklad\Entity\Agent;

class Organization extends Agent
{
    /** @var bool */
    public $archived;

    /** @var string */
    public $legalTitle;

    /** @var string */
    public $email;

    /** @var bool */
    public $isEgaisEnable;

    /** @var bool */
    public $payerVat;

    /** @var string */
    public $director;

    /** @var string */
    public $chiefAccountant;

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
    public $phone;

    /** @var string */
    public $fax;

    /** @var string */
    public $fsrarId;

    /** @var string */
    public $utmUrl;

    /** @var string */
    public $actualAddress;

    /** @var string  */
    public $companyType; //@todo make this field is enum

    //@todo without AgentAccounts[] field

    /**
     * @param array $data
     * @return Organization
     */
    public static function createFromArray(array $data): self
    {
        $entity = new self();
        $entity->archived = $data['archived'];
        $entity->legalTitle = $data['legalTitle'];
        $entity->email = $data['email'];
        $entity->isEgaisEnable = $data['isEgaisEnable'];
        $entity->payerVat = $data['payerVat'];
        $entity->director = $data['director'];
        $entity->chiefAccountant = $data['chiefAccountant'];
        $entity->legalAddress = $data['legalAddress'];
        $entity->inn = $data['inn'];
        $entity->kpp = $data['kpp'];
        $entity->ogrn = $data['ogrn'];
        $entity->ogrnip = $data['ogrnip'];
        $entity->okpo = $data['okpo'];
        $entity->certificateNumber = $data['certificateNumber'];
        $entity->certificateDate = $data['certificateDate'];
        $entity->phone = $data['phone'];
        $entity->fax = $data['fax'];
        $entity->fsrarId = $data['fsrarId'];
        $entity->utmUrl = $data['utmUrl'];
        $entity->actualAddress = $data['actualAddress'];
        $entity->companyType = $data['companyType'];

        return $entity;
    }
}
