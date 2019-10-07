<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Product\Product;

class ProductClient extends EntityClientBase
{
    use GetListEndpoint;

    /**
     * ProductClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/product/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Product::class;
    }
}
