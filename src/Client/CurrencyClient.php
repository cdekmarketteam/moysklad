<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Currency;

class CurrencyClient extends EntityClientBase
{
    use GetListEndpoint;

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
