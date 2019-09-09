<?php

namespace MoySklad\Client\Endpoint;

use MoySklad\ApiClient;

interface Endpoint
{
    public function getApi(): ApiClient;
    public function getPath(): string;
}
