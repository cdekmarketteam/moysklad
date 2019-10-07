<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Assortment;

class AssortmentClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * AssortmentClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/assortment/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Assortment::class;
    }
}
