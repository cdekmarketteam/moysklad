<?php

namespace MoySklad\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface RequestSenderInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendRequest(RequestInterface $request): ResponseInterface;
}
