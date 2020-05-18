<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\Annotation\Generator;

class Unit
{
    /**
     * @Type("string")
     * @Generator()
     */
    public $gender;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s1;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s2;

    /**
     * @Type("string")
     * @Generator()
     */
    public $s5;
}
