<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Task;

class TaskClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

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
