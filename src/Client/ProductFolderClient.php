<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\Product\ProductFolder;

class ProductFolderClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * ProductFolderClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/productfolder/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ProductFolder::class;
    }
}
