<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\Context;
use MoySklad\Entity\MetaEntity;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class ContextClient extends EntityClientBase
{
    /**
     * ContextClient constructor
     *
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/context/');
    }

    /**
     * @param string $contextKey
     * @return MetaEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function get(string $contextKey): MetaEntity
    {
        return RequestExecutor::path($this->getApi(), $this->getPath().$contextKey)->post(Context::class);
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Context::class;
    }
}
