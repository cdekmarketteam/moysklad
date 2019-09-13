<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\Endpoint;

abstract class EntityClientBase implements Endpoint
{
    /** @var ApiClient */
    protected $api;

    /** @var string */
    protected $path;

    public function __construct(ApiClient $api, string $path)
    {
        $this->api = $api;
        $this->path = $path;
    }

    /**
     * @return ApiClient
     */
    public function getApi(): ApiClient
    {
        return $this->api;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
