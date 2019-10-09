<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Product\Service;

class ServiceClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * ServiceClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/service/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Service::class;
    }
}
