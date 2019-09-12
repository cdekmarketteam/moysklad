<?php

namespace MoySklad\Client;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\Endpoint;

abstract class EntityClientBase implements Endpoint
{
    protected const SERIALIZE_FORMAT = 'json';

    /** @var ApiClient */
    protected $api;

    /** @var string */
    protected $path;

    /** @var Serializer */
    public $serializer;

    public function __construct(ApiClient $api, string $path)
    {
        $this->api = $api;
        $this->path = $path;
        $this->serializer = SerializerBuilder::create()->build();
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
