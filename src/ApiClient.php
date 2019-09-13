<?php

namespace MoySklad;

use MoySklad\Client\EntityClient;
use MoySklad\Http\GuzzleRequestSender;
use MoySklad\Http\RequestSenderInterface;
use MoySklad\Util\StringsTrait;

class ApiClient
{
    use StringsTrait;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var RequestSenderInterface
     */
    private $client;

    /**
     * ApiClient constructor.
     * @param string $host
     * @param bool $forceHttps
     * @param string $login
     * @param string $password
     * @param RequestSenderInterface|null $client
     * @throws \Exception
     */
    public function __construct(string $host, bool $forceHttps, string $login, string $password, RequestSenderInterface $client = null)
    {
        $host = trim($host);
        if ($host == null || empty($host)) {
            throw new \Exception("Host's address cannot be empty or null!");
        }

        while ($this->endsWith($host, "/")) {
            $host = substr($host, 0, -1);
        }

        if ($forceHttps) {
            if ($this->startsWith($host, "http://")) {
                $host = str_replace("http://", "https://", $host);
            } elseif (!$this->startsWith($host, "https://")) {
                $host = "https://".$host;
            }
        } else {
            if (!$this->startsWith($host, "https://") && !$this->startsWith($host, "http://")) {
                $host = "http://".$host;
            }
        }

        $this->host = $host;
        $this->client = $client ?? new GuzzleRequestSender();
        $this->setCredentials($login, $password);
    }

    /**
     * @param string $login
     * @param string $password
     */
    public function setCredentials(string $login, string $password): void
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @param RequestSenderInterface $client
     */
    public function setHttpClient(RequestSenderInterface $client): void
    {
        $this->client = $client;
    }

    /**
     * @return EntityClient
     */
    public function entity(): EntityClient
    {
        return new EntityClient($this);
    }

    /**
     * @return RequestSenderInterface
     */
    public function getClient(): RequestSenderInterface
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
