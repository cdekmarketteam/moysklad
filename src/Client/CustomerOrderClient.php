<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\Document\CustomerOrder;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class CustomerOrderClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint,
        PostEntityEndpoint,
        DeleteEntityEndpoint,
        GetMetadataAttributeEndpoint,
        PostEntitiesEndpoint,
        DeleteEntitiesEndpoint;

    /**
     * CustomerOrderClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/customerorder/');
    }

    /**
     * @param string $search
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function search(string $search): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path(
                $this->getApi(),
                $this->getPath() . '?' . http_build_query(['search' => $search])
            )
             ->params([])
             ->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CustomerOrder::class;
    }
}
