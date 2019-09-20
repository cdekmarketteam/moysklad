<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;

abstract class EntityClientBase
{
    /**
     * @var ApiClient
     */
    protected $api;

    /**
     * @var string
     */
    protected $path;

    public function __construct(ApiClient $api, string $path)
    {
        $this->api = $api;
        $this->path = $path;
    }

    abstract protected function getMetaEntityClass(): string;

    /**
     * @return ApiClient
     */
    protected function getApi(): ApiClient
    {
        return $this->api;
    }

    /**
     * @return string
     */
    protected function getPath(): string
    {
        return $this->path;
    }
}
