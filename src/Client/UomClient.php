<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Uom;

class UomClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * UomClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/uom/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Uom::class;
    }
}
