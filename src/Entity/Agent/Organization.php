<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class Organization extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("string")
     */
    public $code;

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
    public $trackingContractNumber;

    /**
     * @Type("string")
     */
    public $legalAddress;

    /**
     * @Type("string")
     */
    public $fax;

    /**
     * @Type("string")
     */
    public $utmUrl;

    /**
     * @Type("string")
     */
    public $director;

    /**
     * @Type("string")
     */
    public $chiefAccountant;

    /**
     * @Type("string")
     */
    public $legalTitle;

    /**
     * @Type("string")
     */
    public $okpo;

    /**
     * @Type("string")
     */
    public $ogrnip;

    /**
     * @Type("string")
     */
    public $certificateNumber;

    /**
     * @Type("string")
     */
    public $kpp;

    /**
     * @Type("string")
     */
    public $ogrn;

    /**
     * @Type("string")
     */
    public $fsrarId;

    /**
     * @Type("int")
     */
    public $bonusPoints;

    /**
     * @Type("bool")
     */
    public $isEgaisEnable;

    /**
     * @Type("bool")
     */
    public $payerVat;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $certificateDate;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $trackingContractDate;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $actualAddressFull;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $legalAddressFull;

    /**
     * @Type("MoySklad\Entity\Discount\BonusProgram")
     */
    public $bonusProgram;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $accounts;
}
