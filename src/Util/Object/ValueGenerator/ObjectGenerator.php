<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\ApiClient;
use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\Util\Object\ObjectBuilder;

class ObjectGenerator implements GeneratorInterface
{
    /**
     * @var ApiClient
     */
    private $api;

    /**
     * @var ObjectBuilder
     */
    private $objectBuilder;

    public function __construct(ApiClient $api, ObjectBuilder $objectBuilder)
    {
        $this->api           = $api;
        $this->objectBuilder = $objectBuilder;
    }

    public function generate(Generator $generatorConfig): object
    {
        if (empty($generatorConfig->serializerType)) {
            throw new \RuntimeException(
                "You must specify property type via JMS\Serializer\Annotation\Type when you set 'anyFromExists'"
            );
        }

        if ($generatorConfig->anyFromExists) {
            return $this->getAnyFromExists($generatorConfig->serializerType);
        }

        return $this->objectBuilder->createObject($generatorConfig->serializerType, $generatorConfig->generatorProperty);
    }

    protected function getAnyFromExists(string $class)
    {
        if (empty($objects = $this->api->getAllClassObjects($class))) {
            throw new \RuntimeException("No objects for class '$class'");
        }

        return $objects[rand(0, count($objects) - 1)];
    }
}
