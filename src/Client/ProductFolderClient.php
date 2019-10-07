<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetListEndpoint;
use MoySklad\Entity\Product\ProductFolder;

class ProductFolderClient extends EntityClientBase
{
    use GetListEndpoint;

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
