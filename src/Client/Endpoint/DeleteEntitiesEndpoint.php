<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\DeleteResponse;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

trait DeleteEntitiesEndpoint
{
    /**
     * @param MetaEntity[] $entities
     * @return DeleteResponse[]
     * @throws ApiClientException
     * @throws \Exception
     */
    public function massDelete(array $entities): array
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        $className = DeleteResponse::class;

        /** @var DeleteResponse[] $deleteResponses */
        $deleteResponses = RequestExecutor::path($this->getApi(), $this->getPath().'delete')->bodyArray($entities)->post("array<{$className}>");

        return $deleteResponses;
    }
}
