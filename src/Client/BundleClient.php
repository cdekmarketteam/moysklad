<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Product\Bundle;

class BundleClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * BundleClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/bundle/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Bundle::class;
    }
}
