<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\Context;
use MoySklad\Http\VendorRequestExecutor;
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
        parent::__construct($api, '/context/');
    }

    /**
     * @param string $contextKey
     * @return Context|mixed
     * @throws ApiClientException
     * @throws \Exception
     */
    public function get(string $contextKey): Context
    {
        return VendorRequestExecutor::path($this->getApi(), $this->getPath() . $contextKey)
                                    ->post(Context::class);
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Context::class;
    }
}
