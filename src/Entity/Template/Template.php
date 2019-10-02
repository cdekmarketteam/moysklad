<?php

namespace MoySklad\Entity\Template;

use JMS\Serializer\Annotation\Type;
use MoySklad\Entity\MetaEntity;

abstract class Template extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $type;

    /**
     * @Type("string")
     */
    public $content;
}
