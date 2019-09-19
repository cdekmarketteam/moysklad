<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class Counterparty extends MetaEntity
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
    public $fax;

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
    public $discountCardNumber;

    /**
     * @Type("string")
     */
    public $legalTitle;

    /**
     * @Type("string")
     */
    public $legalAddress;

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
     * @Type("int")
     */
    public $salesAmount;

    /**
     * @Type("int")
     */
    public $bonusPoints;

    /**
     * @Type("array")
     */
    public $tags = [];

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $certificateDate;

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
     */
    public $priceType;

    /**
     * @Type("MoySklad\Entity\Address")
     */
    public $actualAddressFull;

    /**
     * @Type("MoySklad\Entity\Address")
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
