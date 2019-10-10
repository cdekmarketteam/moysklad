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
use MoySklad\Entity\Component;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Product\Bundle;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class BundleClient extends EntityClientBase
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
     * BundleClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/bundle/');
    }

    /**
     * @param string $bundleId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getComponentsList(string $bundleId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$bundleId.'/components')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $bundleId
     * @param Component $component
     * @return Component
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createComponent(string $bundleId, Component $component): Component
    {
        /** @var Component $component */
        $component = RequestExecutor::path($this->getApi(), $this->getPath().$bundleId.'/components')->body($component)->post(Component::class);

        return $component;
    }

    /**
     * @param string $bundleId
     * @param string $componentId
     * @return Component
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getComponent(string $bundleId, string $componentId): Component
    {
        /** @var Component $component */
        $component = RequestExecutor::path($this->getApi(), $this->getPath().$bundleId.'/components/'.$componentId)->get(Component::class);

        return $component;
    }

    /**
     * @param string $bundleId
     * @param string $componentId
     * @param Component $updatedComponent
     * @return Component
     * @throws ApiClientException
     * @throws \Exception
     */
    public function updateComponent(string $bundleId, string $componentId, Component $updatedComponent): Component
    {
        /** @var Component $component */
        $component = RequestExecutor::path($this->getApi(), $this->getPath().$bundleId.'/components/'.$componentId)->body($updatedComponent)->put(Component::class);

        return $component;
    }

    /**
     * @param string $bundleId
     * @param string $componentId
     * @throws ApiClientException
     * @throws \Exception
     */
    public function deleteComponent(string $bundleId, string $componentId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$bundleId.'/components/'.$componentId)->delete();
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Bundle::class;
    }
}
