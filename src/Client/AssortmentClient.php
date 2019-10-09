<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Assortment;

class AssortmentClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * AssortmentClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/assortment/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Assortment::class;
    }
}
