<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class ListEntity extends MetaEntity
{
    /**
     * @Type("MoySklad\Entity\Context")
     */
    public $context;

    /**
     * @Type("array<MoySklad\Entity\MetaEntity>")
     */
    public $rows;
}
