<?php

namespace MoySklad\Entity\Metadata;

use JMS\Serializer\Annotation\Type;

class VariantMetadata extends Metadata
{
    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $characteristics = [];
}
