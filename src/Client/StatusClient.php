<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\Status;
use MoySklad\Http\VendorRequestExecutor;
use MoySklad\Util\Exception\ApiClientException;

class StatusClient extends EntityClientBase
{
    /**
     * ContextClient constructor
     *
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/apps');
    }

    /**
     * @param string|Status $status
     * @param string $appId
     * @param string $moySkladId
     * @return mixed|Status
     * @throws ApiClientException
     */
    public function set(string $status, string $appId, string $moySkladId): Status
    {
        return VendorRequestExecutor::path($this->getApi(), $this->getPath() . "/$appId/$moySkladId/status")
                                    ->bodyArray([
                                        'status' => $status
                                    ])
                                    ->put(Status::class);
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Status::class;
    }
}
