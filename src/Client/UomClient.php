<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Uom;

class UomClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * UomClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/uom/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Uom::class;
    }
}
