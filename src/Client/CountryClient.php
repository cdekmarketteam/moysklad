<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Country;

class CountryClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * CountryClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/country/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Country::class;
    }
}
