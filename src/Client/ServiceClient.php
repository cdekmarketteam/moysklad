<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Product\Service;

class ServiceClient extends EntityClientBase
{
    use GetListEndpoint;

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
