<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Unit
{
    /**
     * @Type("string")
     */
    public $gender;

    /**
     * @Type("string")
     */
    public $s1;

    /**
     * @Type("string")
     */
    public $s2;

    /**
     * @Type("string")
     */
    public $s5;
}
