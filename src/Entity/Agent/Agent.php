<?php

namespace MoySklad\Entity\Agent;

use MoySklad\Entity\MetaEntity;

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
     * @Type("Datetime")
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
