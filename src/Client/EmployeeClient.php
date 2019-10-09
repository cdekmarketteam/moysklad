<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Agent\Employee;

class EmployeeClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * EmployeeClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/employee/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Employee::class;
    }
}
