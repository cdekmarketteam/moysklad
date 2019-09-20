<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

trait GetByEndpoint
{
    /**
     * @param string $id
     * @param array $params
     * @return MetaEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getById(string $id, array $params = [])
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        return RequestExecutor::path($this->getApi(), $this->getPath().$id)->params($params)->get($this->getMetaEntityClass());
    }

    /**
     * @param MetaEntity $entity
     * @param array $params
     * @return MetaEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getByEntity(MetaEntity $entity, array $params = [])
    {
        return $this->getById($entity->id, $params);
    }
}
