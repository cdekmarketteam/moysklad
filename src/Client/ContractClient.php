<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntitiesEndpoint;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\PostEntitiesEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\Contract;
use MoySklad\Entity\Metadata\AdditionMetadata;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class ContractClient extends EntityClientBase
{
    use
        GetEntitiesListEndpoint,
        PostEntityEndpoint,
        PostEntitiesEndpoint,
        DeleteEntityEndpoint,
        DeleteEntitiesEndpoint,
        GetMetadataAttributeEndpoint,
        GetEntityEndpoint,
        PutEntityEndpoint;

    /**
     * ContractClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/contract/');
    }

    /**
     * @return AdditionMetadata
     * @throws ApiClientException
     */
    public function getMetadata(): AdditionMetadata
    {
        /** @var $additionMetadata AdditionMetadata */
        $additionMetadata = RequestExecutor::path($this->getApi(), $this->getPath().'metadata')->get(AdditionMetadata::class);

        return $additionMetadata;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Contract::class;
    }
}
