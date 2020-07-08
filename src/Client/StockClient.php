<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Entity\ListByStocks;
use MoySklad\Entity\ListEntity;
use MoySklad\Entity\Stock;
use MoySklad\Http\RequestExecutor;
use MoySklad\Util\Exception\ApiClientException;
use MoySklad\Util\Param\Param;

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
    use GetMetadataEndpoint,
        GetMetadataAttributeEndpoint;

    /**
     * ServiceClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/report/stock');
    }

    /**
     * Получение всех остатков
     *
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getAll(array $params = []) : ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath() . '/all')->params($params)->get(ListEntity::class);

        return $listEntity;
    }

    /**
     * Получение остатков по складам
     *
     * @param Param[] $params
     * @return ListEntity
     * @throws ApiClientException
     * @throws \Exception
     */
    public function getAllByStore(array $params = []) : ListEntity
    {
        /** @var $listEntity ListEntity */
        $listEntity = RequestExecutor::path($this->getApi(), $this->getPath() . '/bystore')->params($params)->get(ListByStocks::class);

        return $listEntity;
    }

    // Есть ещё отчёт с остатками по документу
    // @see https://dev.moysklad.ru/doc/api/remap/1.1/#отчёт-остатки-остатки-по-документам-get

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return Stock::class;
    }
}
