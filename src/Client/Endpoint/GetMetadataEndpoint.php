<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\Client\EntityClientBase;
use MoySklad\Entity\Metadata\GeneralMetadata;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

trait GetMetadataEndpoint
{
    /**
     * @return MetaEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getMetadata(): MetaEntity
    {
        if (get_parent_class($this) !== EntityClientBase::class) {
            throw new \Exception('The trait cannot be used outside the EntityClientBase class');
        }

        return RequestExecutor::path($this->getApi(), $this->getPath().'metadata')->get(GeneralMetadata::class);
    }
}
