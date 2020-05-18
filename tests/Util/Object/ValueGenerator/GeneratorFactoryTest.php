<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\ApiClient;
use MoySklad\Util\Object\ValueGenerator\GeneratorFactory;
use MoySklad\Util\Object\ValueGenerator\BoolGenerator;
use MoySklad\Util\Object\ValueGenerator\DateTimeGenerator;
use MoySklad\Util\Object\ValueGenerator\FloatGenerator;
use MoySklad\Util\Object\ValueGenerator\IntGenerator;
use MoySklad\Util\Object\ValueGenerator\NegativeIntGenerator;
use MoySklad\Util\Object\ValueGenerator\ObjectArrayGenerator;
use MoySklad\Util\Object\ValueGenerator\ObjectGenerator;
use MoySklad\Util\Object\ValueGenerator\StringArrayGenerator;
use MoySklad\Util\Object\ValueGenerator\StringGenerator;
use MoySklad\Util\Object\ObjectBuilder;
use MoySklad\Util\Object\GeneratorProperty;

class GeneratorFactoryTest extends TestCase
{
    /**
     * @dataProvider generatorProvider
     * @param string $type
     * @param string $class
     */
    public function testGenerate(string $type, string $class)
    {
        $api               = $this->createMock(ApiClient::class);
        $generatorProperty = $this->createMock(GeneratorProperty::class);
        $objectBuilder     = $this->createMock(ObjectBuilder::class);

        $valueGenerator = new GeneratorFactory($api, $generatorProperty);
        $valueGenerator->setObjectBuilder($objectBuilder);

        $this->assertInstanceOf($class, $valueGenerator->create($type));
    }

    public function generatorProvider()
    {
        return [
            ['bool', BoolGenerator::class],
            ['datetime', DateTimeGenerator::class],
            ['float', FloatGenerator::class],
            ['int', IntGenerator::class],
            ['negativeInt', NegativeIntGenerator::class],
            ['objectArray', ObjectArrayGenerator::class],
            ['object', ObjectGenerator::class],
            ['stringArray', StringArrayGenerator::class],
            ['string', StringGenerator::class],
        ];
    }
}
