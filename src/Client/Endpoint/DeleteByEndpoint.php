<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

trait DeleteByEndpoint
{
    /**
     * @param string $id
     * @throws ApiClientException
     * @throws \Exception
     */
    public function deleteById(string $id): void
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        RequestExecutor::path($this->getApi(), $this->getPath().$id)->delete();
    }

    /**
     * @param MetaEntity $entity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function deleteByEntity(MetaEntity $entity): void
    {
        $this->deleteById($entity->id);
    }
}
