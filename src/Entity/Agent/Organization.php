<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Organization extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $syncId;

    /**
     * @Type("string")
     * @Generator()
     */
    public $code;

    /**
     * @Type("string")
     * @Generator()
     */
    public $name;

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
     * @Generator()
     */
    public $fax;

    /**
     * @Type("string")
     * @Generator()
     */
    public $utmUrl;

    /**
     * @Type("string")
     * @Generator()
     */
    public $director;

    /**
     * @Type("string")
     * @Generator()
     */
    public $chiefAccountant;

    /**
     * @Type("string")
     * @Generator()
     */
    public $legalTitle;

    /**
     * @Type("string")
     * @Generator()
     */
    public $okpo;

    /**
     * @Type("string")
     */
    public $ogrnip;

    /**
     * @Type("string")
     * @Generator()
     */
    public $certificateNumber;

    /**
     * @Type("string")
     * @Generator()
     */
    public $kpp;

    /**
     * @Type("string")
     * @Generator()
     */
    public $ogrn;

    /**
     * @Type("string")
     * @Generator()
     */
    public $fsrarId;

    /**
     * @Type("int")
     */
    public $bonusPoints;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $isEgaisEnable;

    /**
     * @Type("bool")
     * @Generator()
     */
    public $payerVat;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $certificateDate;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     */
    public $trackingContractDate;

    /**
     * @Type("MoySklad\Entity\Address")
     * @Generator(type="object")
     */
    public $actualAddressFull;

    /**
     * @Type("MoySklad\Entity\Address")
     * @Generator(type="object")
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
