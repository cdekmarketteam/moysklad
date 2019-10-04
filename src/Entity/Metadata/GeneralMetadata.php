<?php

namespace MoySklad\Entity\Metadata;

use JMS\Serializer\Annotation\Type;

/**
 * Class Metadata for getting metadata for
 *     service, bundle, productFolder, consignment, employee, product, project, store, organization
 */
class GeneralMetadata extends Metadata
{
    /**
     * @Type("bool")
     */
    public $createShared;

    /**
     * @Type("array<MoySklad\Entity\Attribute>")
     */
    public $attributes = [];
}
