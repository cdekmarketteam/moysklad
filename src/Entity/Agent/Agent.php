<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

abstract class Agent extends MetaEntity
{
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
    public $inn;

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
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $certificateDate;

    /**
     * @Type("string")
     */
    public $kpp;

    /**
     * @Type("string")
     */
    public $ogrn;
}
