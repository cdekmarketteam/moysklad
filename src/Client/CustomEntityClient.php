<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\DeleteEntityEndpoint;
use MoySklad\Client\Endpoint\PostEntityEndpoint;
use MoySklad\Client\Endpoint\PutEntityEndpoint;
use MoySklad\Entity\CustomEntity;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

class CustomEntityClient extends EntityClientBase
{
    use
        PostEntityEndpoint,
        DeleteEntityEndpoint,
        PutEntityEndpoint;

    /**
     * CustomEntityClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/customentity/');
    }

    /**
     * @param string $customEntityId
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getSubCustomEntitiesList(string $customEntityId, array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath().$customEntityId)->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $customEntityId
     * @param CustomEntity $subCustomEntity
     * @return CustomEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function createSubCustomEntity(string $customEntityId, CustomEntity $subCustomEntity): CustomEntity
    {
        /** @var CustomEntity $subCustomEntity */
        $subCustomEntity = RequestExecutor::path($this->getApi(), $this->getPath().$customEntityId)->body($subCustomEntity)->post(CustomEntity::class);

        return $subCustomEntity;
    }

    /**
     * @param string $customEntityId
     * @param string $subCustomEntityId
     * @throws ApiClientException
     * @throws \Exception
     */
    public function deleteSubCustomEntity(string $customEntityId, string $subCustomEntityId): void
    {
        RequestExecutor::path($this->getApi(), $this->getPath().$customEntityId.'/'.$subCustomEntityId)->delete();
    }

    /**
     * @param string $customEntityId
     * @param string $subCustomEntityId
     * @return CustomEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getSubCustomEntity(string $customEntityId, string $subCustomEntityId): CustomEntity
    {
        /** @var CustomEntity $subCustomEntity */
        $subCustomEntity = RequestExecutor::path($this->getApi(), $this->getPath().$customEntityId.'/'.$subCustomEntityId)->get(CustomEntity::class);

        return $subCustomEntity;
    }

    /**
     * @param string $customEntityId
     * @param string $subCustomEntityId
     * @param CustomEntity $subCustomEntity
     * @return CustomEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function updateSubCustomEntity(string $customEntityId, string $subCustomEntityId, CustomEntity $subCustomEntity): CustomEntity
    {
        /** @var CustomEntity $subCustomEntity */
        $subCustomEntity = RequestExecutor::path($this->getApi(), $this->getPath().$customEntityId.'/'.$subCustomEntityId)->body($subCustomEntity)->put(CustomEntity::class);

        return $subCustomEntity;
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CustomEntity::class;
    }
}
