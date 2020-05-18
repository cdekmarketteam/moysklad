<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\MetaEntity;

/**
 * @method MetaEntity[] massDelete(array $entities)
 * @method void function delete(string $id)
 * @method ListEntity getList(array $params = [])
 * @method MetaEntity get(string $id)
 * @method MetaEntity getMetadataAttribute(string $id)
 * @method MetaEntity getMetadata()
 * @method MetaEntity[] massUpdate(array $entities)
 * @method MetaEntity create(MetaEntity $newEntity)
 * @method MetaEntity update(string $id, MetaEntity $updatedEntity)
 */
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
}
