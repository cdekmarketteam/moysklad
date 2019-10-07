<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Store\RetailStore;

class RetailStoreClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * RetailStoreClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/retailstore/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return RetailStore::class;
    }
}
