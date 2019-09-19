<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Param\Param;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Entity\MetaEntity;

abstract class EntityClientBase
{
    /**
     * @var ApiClient
     */
    protected $api;

    /**
     * @var string
     */
    protected $path;

    public function __construct(ApiClient $api, string $path)
    {
        $this->api = $api;
        $this->path = $path;
    }

    abstract protected function getMetaEntityClass(): string;

    /**
     * @return ApiClient
     */
    protected function getApi(): ApiClient
    {
        return $this->api;
    }

    /**
     * @return string
     */
    protected function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     */
    public function getList(array $params = []): ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath())->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * @param string $id
     * @param array $params
     * @return MetaEntity
     * @throws ApiClientException
     */
    public function getById(string $id, array $params = [])
    {
        return RequestExecutor::path($this->getApi(), $this->getPath().$id)->params($params)->get($this->getMetaEntityClass());
    }
}
