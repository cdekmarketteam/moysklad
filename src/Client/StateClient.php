<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Client\Endpoint\GetEntityEndpoint;
use MoySklad\Client\Endpoint\GetMetadataAttributeEndpoint;
use MoySklad\Client\Endpoint\GetMetadataEndpoint;
use MoySklad\Entity\ListStates;
use MoySklad\Entity\State;

/**
 * Class StateClient
 *
 * Клиент работы со статусами (заказов)
 */
class StateClient extends EntityClientBase
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
        parent::__construct($api, '/entity/customerorder/metadata?entityType=state');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return State::class;
    }

    /**
     * Класс списка для данной выборки
     *
     * @return string
     */
    protected function getListEntityClass() : string
    {
        return ListStates::class;
    }
}
