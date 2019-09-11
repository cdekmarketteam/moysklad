<?php

namespace MoySklad\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GuzzleRequestSender implements RequestSenderInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return (new Client())->send($request);
    }
}
