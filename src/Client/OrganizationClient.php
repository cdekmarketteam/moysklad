<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Agent\Organization;

class OrganizationClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * OrganizationClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/organization/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Organization::class;
    }
}
