<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\ListEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

trait GetListTrait
{
    /**
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getList(array $params = []): ListEntity
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath())->params($params)->get(ListEntity::class);

        return $listEntity;
    }
}
