<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Contract;

class ContractClient extends EntityClientBase
{
    use GetListEndpoint;

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
