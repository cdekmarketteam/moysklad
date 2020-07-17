<?php

namespace MoySklad\Tests;

use PHPUnit\Framework\TestCase;
use MoySklad\ApiClient;

abstract class AbstractApiTest extends TestCase
{
    /**
     * @var ApiClient
     */
    protected static $api;

    public static function setUpBeforeClass() : void
    {
        self::$api = new ApiClient(
            getenv('MOYSKLAD_HOST'),
            true,
            [
                'login'    => getenv('MOYSKLAD_LOGIN'),
                'password' => getenv('MOYSKLAD_PASSWORD'),
            ]
        );
    }
}
