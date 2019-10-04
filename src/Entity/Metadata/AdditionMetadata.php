<?php

namespace MoySklad\Entity\Metadata;

use JMS\Serializer\Annotation\Type;

/**
 * Class StatesMetadata for getting metadata for
 *     contract, counterparty
 */
class AdditionMetadata extends GeneralMetadata
{
    /**
     * @Type("array<MoySklad\Entity\State>")
     */
    public $states = [];

    /**
     * @Type("array<string>")
     */
    public $tags = [];
}
