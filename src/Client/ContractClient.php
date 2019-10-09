<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Contract;

class ContractClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * ContractClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/contract/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Contract::class;
    }
}
