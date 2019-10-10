<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Entity\Discount\BonusProgram;

class BonusProgramClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        GetEntityEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * BonusProgramClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/bonusprogram/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return BonusProgram::class;
    }
}
