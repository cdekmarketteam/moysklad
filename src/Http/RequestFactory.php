<?php

namespace MoySklad\Http;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

/**
 * Class RequestFactory
 *
 * @package MoySklad\Http
 */
class RequestFactory
{
    /** @var string  */
    private $serviceUrl;

    /** @var string  */
    private $serviceApiKey;

    public function __construct(string $serviceUrl, string $serviceApiKey)
    {
        $this->serviceUrl = $serviceUrl;
        $this->serviceApiKey = $serviceApiKey;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $parameters
     * @param string $body
     * @return RequestInterface
     */
    public function createRequest(string $method, string $path, array $parameters = [], string $body = ''): RequestInterface
    {
        return new Request(
            $method,
            $this->serviceUrl.$path.'?'.http_build_query($parameters),
            [
                'X-API-KEY'    => $this->serviceApiKey,
                'Content-Type' => 'application/json'
            ],
            $body
        );
    }
}
