<?php

namespace MoySklad\Util\Exception;

class ApiClientException extends \Exception
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $reasonPhrase;

    /**
     * ApiClientException constructor.
     * @param string $uri
     * @param int $statusCode
     * @param string $reasonPhrase
     */
    public function __construct(string $uri, int $statusCode, string $reasonPhrase)
    {
        parent::__construct($uri.': '.$statusCode.' '.$reasonPhrase, $statusCode);

        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
    }
}
