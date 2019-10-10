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
use MoySklad\Entity\Metadata\VariantMetadata;
use MoySklad\Entity\Variant;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class VariantClient extends EntityClientBase
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
     * VariantClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/variant/');
    }

    /**
     * @return VariantMetadata
     * @throws ApiClientException
     */
    public function getMetadata(): VariantMetadata
    {
        /** @var $variantMetadata VariantMetadata */
        $variantMetadata = RequestExecutor::path($this->getApi(), $this->getPath().'metadata')->get(VariantMetadata::class);

        return $variantMetadata;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Variant::class;
    }
}
