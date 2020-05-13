<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\ApiClient;
use MoySklad\Util\Object\GeneratorProperty;
use MoySklad\Util\Object\ObjectBuilder;

class GeneratorFactory
{
    /**
     * @var ApiClient
     */
    private $api;

    /**
     * @var ObjectBuilder
     */
    private $objectBuilder;

    /**
     * @var GeneratorProperty
     */
    private $generatorProperty;

    public function __construct(ApiClient $api, GeneratorProperty $generatorProperty)
    {
        $this->api               = $api;
        $this->generatorProperty = $generatorProperty;
    }

    public function setObjectBuilder(ObjectBuilder $objectBuilder)
    {
        $this->objectBuilder = $objectBuilder;
    }

    public function create(string $type): GeneratorInterface
    {
        $creatingMethod = 'create' . ucfirst($type) . 'Generator';
        if (!method_exists($this, $creatingMethod)) {
            throw new \RuntimeException("Undefined generator with type '$type'");
        }

        return $this->$creatingMethod();
    }

    public function createStringGenerator(): StringGenerator
    {
        return new StringGenerator();
    }

    public function createIntGenerator(): IntGenerator
    {
        return new IntGenerator();
    }

    public function createNegativeIntGenerator(): NegativeIntGenerator
    {
        return new NegativeIntGenerator();
    }

    public function createFloatGenerator(): FloatGenerator
    {
        return new FloatGenerator();
    }

    public function createBoolGenerator(): BoolGenerator
    {
        return new BoolGenerator();
    }

    public function createDateTimeGenerator(): DateTimeGenerator
    {
        return new DateTimeGenerator();
    }

    public function createObjectGenerator(): ObjectGenerator
    {
        if (!$this->objectBuilder instanceof ObjectBuilder) {
            throw new \Exception('You must set an object builder');
        }

        return new ObjectGenerator($this->api, $this->objectBuilder);
    }

    public function createStringArrayGenerator(): StringArrayGenerator
    {
        return new StringArrayGenerator($this->createStringGenerator());
    }

    public function createObjectArrayGenerator(): ObjectArrayGenerator
    {
        return new ObjectArrayGenerator($this->createObjectGenerator(), $this->generatorProperty);
    }
}
