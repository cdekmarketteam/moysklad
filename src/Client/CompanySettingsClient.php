<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\CompanySettings;

class CompanySettingsClient extends EntityClientBase
{
    /**
     * CompanySettingsClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/context/companysettings/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CompanySettings::class;
    }
}
