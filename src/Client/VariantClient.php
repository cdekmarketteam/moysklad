<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Variant;

class VariantClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * VariantClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/variant/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Variant::class;
    }
}
