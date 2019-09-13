<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class MetaEntity
{
    /**
     * @Type("string")
     */
    public $id;

    /**
     * @Type("string")
     */
    public $accountId;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    protected $meta;
}
