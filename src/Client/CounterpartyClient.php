<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\AgentAccount;
use MoySklad\Http\RequestExecutor;

class CounterpartyClient extends EntityClientBase
{
    /**
     * CounterpartyClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/counterparty/');
    }

    /**
     * @param string $counterpartyId
     * @param string $accountId
     * @param array $params
     * @return AgentAccount
     * @throws \MoySklad\Util\ApiClientException
     */
    public function getAccount(string $counterpartyId, string $accountId, array $params): AgentAccount
    {
        /** @var $agentAccount AgentAccount */
        $agentAccount = RequestExecutor::path($this->getApi(), $this->getPath().$counterpartyId.'/accounts/'.$accountId)->params($params)->get(AgentAccount::class);

        return $agentAccount;
    }
}
