<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class WebHook extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $entityType;

    /**
     * @Type("string")
     */
    public $url;

    /**
     * @Type("string")
     */
    public $method;

    /**
     * @Type("string")
     */
    public $action;

    /**
     * @Type("bool")
     */
    public $enabled;
}
