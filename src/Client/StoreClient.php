<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Store\Store;

class StoreClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * StoreClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/store/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Store::class;
    }
}
