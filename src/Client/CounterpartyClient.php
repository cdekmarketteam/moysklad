<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;

class CounterpartyClient extends EntityClientBase
{
    /**
     * CounterpartyClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/counterparty/');
    }
}
