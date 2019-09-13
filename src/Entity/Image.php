<?php

namespace MoySklad\Entity;

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
     * @Type("DateTime")
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
