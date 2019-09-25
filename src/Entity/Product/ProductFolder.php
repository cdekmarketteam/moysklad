<?php

namespace MoySklad\Entity\Product;

use MoySklad\Entity\MetaEntity;
use JMS\Serializer\Annotation\Type;

class ProductFolder extends MetaEntity
{
    /**
     * @Type("string")
     */
    private $taxSystem;

    /**
     * @Type("string")
     */
    public $name;

    /**
     * @Type("string")
     */
    public $description;

    /**
     * @Type("string")
     */
    public $code;

    /**
     * @Type("string")
     */
    public $pathName;

    /**
     * @Type("string")
     */
    public $externalCode;

    /**
     * @Type("int")
     */
    public $vat;

    /**
     * @Type("int")
     */
    public $effectiveVat;

    /**
     * @Type("bool")
     */
    public $shared;

    /**
     * @Type("bool")
     */
    public $archived;

    /**
     * @Type("DateTime<'Y-m-d H:i:s'>")
     */
    public $updated;

    /**
     * @Type("MoySklad\Entity\Agent\Employee")
     */
    public $owner;

    /**
     * @Type("MoySklad\Entity\Agent\Group")
     */
    public $group;

    /**
     * @Type("MoySklad\Entity\Product\ProductFolder")
     */
    public $productFolder;

    /**
     * @return string
     */
    public function getTaxSystem(): string
    {
        return AbstractProduct::TAX_SYSTEMS[$this->taxSystem];
    }
}
