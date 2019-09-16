<?php

namespace MoySklad\Entity;

use JMS\Serializer\Annotation\Type;

class Image extends MetaEntity
{
    /**
     * @Type("string")
     */
    public $title;

    /**
     * @Type("string")
     */
    public $filename;

    /**
     * @Type("int")
     */
    public $size;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $miniature;

    /**
     * @Type("MoySklad\Entity\Meta")
     */
    public $tiny;
}
