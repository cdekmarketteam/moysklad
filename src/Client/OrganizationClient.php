<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\Account;
use MoySklad\Entity\Agent\Organization;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class OrganizationClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        PostEntityEndpoint,
        PostEntitiesEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint,
        GetMetadataEndpoint,
        GetMetadataAttributeEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint;

    /**
     * OrganizationClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/organization/');
    }

    /**
     * @param string $organizationId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getAccountsList(string $organizationId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$organizationId.'/accounts')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $organizationId
     * @param Account[] $accounts
     * @return Account[]
     * @throws ApiClientException
     * @throws \Exception
     */
    public function massUpdateAccounts(string $organizationId, array $accounts): array
    {
        $className = Account::class;

        return RequestExecutor::path($this->getApi(), $this->getPath().$organizationId.'/accounts')->bodyArray($accounts)->post("array<{$className}>");
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Organization::class;
    }
}
