<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Region;

class RegionClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * RegionClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/region/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Region::class;
    }
}
