<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\Cashier;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Store\RetailStore;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class RetailStoreClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        PostEntityEndpoint,
        PostEntitiesEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint;

    /**
     * RetailStoreClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/retailstore/');
    }

    /**
     * @param string $retailStoreId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getCashiersList(string $retailStoreId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$retailStoreId.'/cashiers')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $retailStoreId
     * @param string $cashierId
     * @return Cashier
     * @throws ApiClientException
     */
    public function getCashier(string $retailStoreId, string $cashierId): Cashier
    {
        /** @var $cashier Cashier */
        $cashier = RequestExecutor::path($this->getApi(), $this->getPath().$retailStoreId.'/cashiers/'.$cashierId)->get(Cashier::class);

        return $cashier;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return RetailStore::class;
    }
}
