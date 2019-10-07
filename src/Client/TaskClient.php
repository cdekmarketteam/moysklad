<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Task;

class TaskClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * TaskClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/task/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Task::class;
    }
}
