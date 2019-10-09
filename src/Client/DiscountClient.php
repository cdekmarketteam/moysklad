<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Discount\Discount;

class DiscountClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * VariantClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/discount/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Discount::class;
    }
}
