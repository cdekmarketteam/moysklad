<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Consignment;

class ConsignmentClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * ConsignmentClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/consignment/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Consignment::class;
    }
}
