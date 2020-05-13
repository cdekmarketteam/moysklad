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
    private $host = '';

    /**
     * @var string
     */
    private $login = '';

    /**
     * @var string
     */
    private $password = '';

    /**
     * @var string
     */
    private $token = '';

    /**
     * @var RequestSenderInterface
     */
    private $client;

    /**
     * ApiClient constructor.
     * @param string $host
     * @param bool $forceHttps
     * @param array $credentials
     * @param RequestSenderInterface|null $client
     * @throws \Exception
     */
    public function __construct(string $host, bool $forceHttps, array $credentials, RequestSenderInterface $client = null)
    {
        if ($this->isInvalidCredentials($credentials)) {
            throw new \Exception("Credential login, password or token must be set!");
        }

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
        $this->setCredentials($credentials);
    }

    /**
     * @param array $credentials
     * @throws \Exception
     */
    public function setCredentials(array $credentials): void
    {
        if (isset($credentials['token'])) {
            $this->token = $credentials['token'];
        } elseif (isset($credentials['login']) && isset($credentials['password'])) {
            $this->login = $credentials['login'];
            $this->password = $credentials['password'];
        } else {
            throw new \Exception("Credential login, password or token must be set!");
        }
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

    public function getAllClassObjects(string $class)
    {
        return (new EntityClient($this))->getAllClassObjects($class);
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

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param array $credentials
     * @return bool
     */
    private function isInvalidCredentials(array $credentials): bool
    {
        return (!isset($credentials['login']) && !isset($credentials['password'])) && !isset($credentials['token']);
    }
}
