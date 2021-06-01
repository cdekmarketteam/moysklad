<?php

namespace MoySklad\Client\Endpoint;

use Exception;
use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

trait GetEntityEndpoint
{
    /**
     * @param string $id
     * @param Param[] $params
     * @return MetaEntity
     * @throws ApiClientException
     * @throws Exception
     */
    public function get(string $id, array $params = []): MetaEntity
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new Exception('The trait cannot be used outside the EntityClientBase class');
        }

        return RequestExecutor::path($this->getApi(), $this->getPath().$id)->params($params)->get($this->getMetaEntityClass());
    }
}
