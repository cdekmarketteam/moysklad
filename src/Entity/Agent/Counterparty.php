<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Counterparty extends MetaEntity
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
     * @Generator()
     */
    public $fax;

    /**
     * @Type("string")
     */
    public $actualAddress;

    /**
     * @Type("string")
     * @Generator(values={"legal", "entrepreneur", "individual"})
     */
    public $companyType;

    /**
     * @Type("string")
     * @Generator()
     */
    public $discountCardNumber;

    /**
     * @Type("string")
     * @Generator()
     */
    public $legalTitle;

    /**
     * @Type("string")
     */
    public $legalAddress;

    /**
     * @Type("string")
     * @Generator(setNullIfNotIn={"companyType": {"legal", "entrepreneur"}})
     */
    public $okpo;

    /**
     * @Type("string")
     * @Generator(setNullIfNotIn={"companyType": {"entrepreneur"}})
     */
    public $ogrnip;

    /**
     * @Type("string")
     * @Generator(setNullIfNotIn={"companyType": {"entrepreneur"}})
     */
    public $certificateNumber;

    /**
     * @Type("DateTime<'Y-m-d H:i:s.v'>")
     * @Generator(type="datetime", setNullIfNotIn={"companyType": {"entrepreneur"}})
     */
    public $certificateDate;

    /**
     * @Type("string")
     * @Generator(setNullIfNotIn={"companyType": {"legal"}})
     */
    public $kpp;

    /**
     * @Type("string")
     * @Generator(setNullIfNotIn={"companyType": {"legal"}})
     */
    public $ogrn;

    /**
     * @Type("int")
     */
    public $salesAmount;

    /**
     * @Type("int")
     */
    public $bonusPoints;

    /**
     * @Type("array<string>")
     * @Generator(type="stringArray")
     */
    public $tags = [];

    /**
     * @Type("MoySklad\Entity\State")
     */
    public $state;

    /**
     * @Type("MoySklad\Entity\Discount\BonusProgram")
     */
    public $bonusProgram;

    /**
     * @Type("MoySklad\Entity\PriceType")
     * @Generator(type="object")
     */
    public $priceType;

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
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $accounts;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $contactpersons;

    /**
     * @Type("MoySklad\Entity\ListEntity")
     */
    public $notes;
}
