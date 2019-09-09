<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;

class EntityClient
{
    /** @var ApiClient */
    private $api;

    public function __construct(ApiClient $api)
    {
        $this->api = $api;
    }

    /**
     * @return CounterpartyClient
     */
    public function counterparty(): CounterpartyClient
    {
        return new CounterpartyClient($this->api);
    }
}
