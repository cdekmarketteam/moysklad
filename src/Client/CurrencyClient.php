<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteByEndpoint;
use MoySklad\Client\Endpoint\GetByEndpoint;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Client\Endpoint\PostEndpoint;
use MoySklad\Client\Endpoint\PutByEndpoint;
use MoySklad\Entity\Currency;

class CurrencyClient extends EntityClientBase
{
    use
        GetListEndpoint,
        GetByEndpoint,
        PutByEndpoint,
        PostEndpoint,
        DeleteByEndpoint;

    /**
     * CurrencyClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/currency/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Currency::class;
    }
}
