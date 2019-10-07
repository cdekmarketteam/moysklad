<?php

namespace MoySklad\Client;

use MoySklad\ApiClient;
use MoySklad\Entity\CustomEntity;

class CustomEntityClient extends EntityClientBase
{
    /**
     * CustomEntityClient constructor.
     * @param ApiClient $api
     */
    public function __construct(ApiClient $api)
    {
        parent::__construct($api, '/entity/customentity/');
    }

    /**
     * @return string
     */
    protected function getMetaEntityClass(): string
    {
        return CustomEntity::class;
    }
}
