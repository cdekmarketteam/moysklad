<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Client\Endpoint\GetEntitiesListEndpoint;
use MoySklad\Entity\ExpenseItem;

class ExpenseItemClient extends EntityClientBase
{
    use GetEntitiesListEndpoint;

    /**
     * ExpenseItemClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/expenseitem/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return ExpenseItem::class;
    }
}
