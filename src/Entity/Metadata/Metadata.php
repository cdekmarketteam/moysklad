<?php

namespace MoySklad\Entity\Metadata;

use JMS\Serializer\Annotation\Type;

abstract class Metadata
{
    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $meta;
}
