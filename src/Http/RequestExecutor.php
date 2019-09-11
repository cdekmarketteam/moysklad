<?php

namespace MoySklad\Http;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use MoySklad\ApiClient;
use MoySklad\Entity\Entity;
use MoySklad\Util\ApiClientException;
use MoySklad\Util\Constant;

final class RequestExecutor
{
    const METHOD_GET = 'GET',
        METHOD_POST = 'POST',
        METHOD_PUT = 'PUT',
        METHOD_DELETE = 'DELETE';

    /** @var string */
    private $hostApiPath;

    /** @var string */
    private $url;

    /** @var array */
    private $query = [];

    /** @var array */
    private $headers = [];

    /** @var array */
    private $params = [];

    /** @var Entity */
    private $body = null;

    /** @var RequestSenderInterface */
    private $client;

    /**
     * RequestExecutor constructor.
     * @param ApiClient $api
     * @param string $url
     */
    private function __construct(ApiClient $api, string $url)
    {
        if ($api == null) {
            throw new \InvalidArgumentException("Для выполнения запроса к API нужен проинициализированный экземпляр ApiClient!");
        }

        $this->client = $api->getClient();
        $this->hostApiPath = $api->getHost().Constant::API_PATH;
        $this->url = $this->hostApiPath.$url;
        $this->auth($api);
    }

    /**
     * @param ApiClient $api
     * @param string $path
     * @return RequestExecutor
     */
    public static function path(ApiClient $api, string $path): self
    {
        return new self($api, $path);
    }

    /**
     * @param string $key
     * @param string $value
     * @return RequestExecutor
     */
    public function header(string $key, string $value): self
    {
        if (strlen($key) > 0) {
            $this->headers[$key] = $value;
        }

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return RequestExecutor
     */
    public function query(string $key, string $value): self
    {
        if (strlen($key) > 0) {
            $this->query[$key] = $value;
        }

        return $this;
    }

    /**
     * @param array $params
     * @return RequestExecutor
     */
    public function params(array $params): self
    {
        if (!is_null($this->params) && count($params) > 0) {
            $this->params = $params;
        }

        return $this;
    }

    /**
     * @param Entity $body
     * @return RequestExecutor
     */
    public function body(Entity $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param ApiClient $api
     * @return RequestExecutor
     */
    private function auth(ApiClient $api): self
    {
        $this->headers['Authorization'] = 'Basic '.base64_encode($api->getLogin().':'.$api->getPassword());

        return $this;
    }

    /**
     * @return string
     */
    private function buildFullUrl(): string
    {
        $query = array_merge($this->query, $this->params);
        $query = http_build_query($query);

        return $this->url.(strlen($query) == 0 ? '' : '?'.$query);
    }

    /**
     * @param Request $request
     * @return array
     * @throws ApiClientException
     */
    private function executeRequest(Request $request): array
    {
        try {
            $response = $this->client->sendRequest($request);

            if ($response->getStatusCode() != 200 &&
                    $response->getStatusCode() != 201 &&
                    $response->getStatusCode() != 204) {

                throw new ApiClientException(
                    $request->getMethod().' '.$request->getUri(),
                    $response->getStatusCode(),
                    $response->getReasonPhrase()
                );
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new ApiClientException($request->getMethod().' '.$request->getUri(), $e->getCode(), $e->getMessage());
        }
    }

    /**
     * @return array
     * @throws ApiClientException
     */
    public function get(): array
    {
        $request = new Request(self::METHOD_GET, $this->buildFullUrl(), $this->headers);

        return $this->executeRequest($request);
    }

    /**
     * @return array
     * @throws ApiClientException
     */
    public function post(): array
    {
        if (!is_null($this->body)) {
            $this->body = json_encode($this->body);
        }

        $request = new Request(self::METHOD_POST, $this->buildFullUrl(), $this->headers, $this->body);

        return $this->executeRequest($request);
    }

    /**
     * @return array
     * @throws ApiClientException
     */
    public function put(): array
    {
        if (!is_null($this->body)) {
            $this->body = json_encode($this->body);
        }

        $request = new Request(self::METHOD_PUT, $this->buildFullUrl(), $this->headers, $this->body);

        return $this->executeRequest($request);
    }

    /**
     * @throws ApiClientException
     */
    public function delete(): void
    {
        $request = new Request(self::METHOD_DELETE, $this->buildFullUrl(), $this->headers);

        $this->executeRequest($request);
    }
}
