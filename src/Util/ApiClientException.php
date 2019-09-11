<?php

namespace MoySklad\Util;

class ApiClientException extends \Exception
{
    /** @var int */
    private $statusCode;

    /** @var string */
    private $reasonPhrase;

    public function __construct(string $uri, int $statusCode, string $reasonPhrase)
    {
        parent::__construct($uri.': '.$statusCode.' '.$reasonPhrase);

        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
    }
}
