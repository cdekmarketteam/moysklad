<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Entity\Stock;

/**
 * Class StockClient
 * @package MoySklad\Client
 *
 * Клиент работы с отчётом остатков
 *
 * @copyright CDEK.MARKET, Ltd. (ООО «СДЭК.МАРКЕТ» http://cdek.market)
 * @project ms-lib
 * @date 20.05.2020 14:23
 * @author Viktor.Fursenko
 */
class StockClient extends EntityClientBase
{
    use GetEntitiesListEndpoint,
        GetMetadataEndpoint,
        GetMetadataAttributeEndpoint,
        GetEntityEndpoint;

    /**
     * ServiceClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/report/stock/all');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Stock::class;
    }
}
