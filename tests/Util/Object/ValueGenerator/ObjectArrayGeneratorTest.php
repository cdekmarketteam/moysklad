<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\ObjectArrayGenerator;
use MoySklad\Util\Object\ValueGenerator\ObjectGenerator;
use MoySklad\Util\Object\GeneratorProperty;
use MoySklad\Util\Object\Annotation\Generator;

class ObjectArrayGeneratorTest extends TestCase
{
    /**
     * @dataProvider objectQuantityProvider
     * @param int $objectQuantity
     */
    public function testGenerate(int $objectQuantity)
    {
        $object = new \stdClass();
        $object->test = '666';

        $generatorConfig = new Generator();
        $generatorConfig->objectQuantity = $objectQuantity;

        $objectGenerator = $this->createMock(ObjectGenerator::class);
        $objectGenerator->expects($this->exactly($objectQuantity))
            ->method('generate')
            ->with($generatorConfig)
            ->willReturn($object);

        $generatorProperty = $this->createMock(GeneratorProperty::class);

        $generator = new ObjectArrayGenerator($objectGenerator, $generatorProperty);
        $objects = $generator->generate($generatorConfig);

        $this->assertCount($objectQuantity, $objects);
        foreach ($objects as $receivedObject) {
            $this->assertEquals($object, $receivedObject);
        }
    }

    public function objectQuantityProvider()
    {
        return [
            [0],
            [1],
            [2],
            [5],
            [13],
        ];
    }

    public function testGenerateOneForEachProperty()
    {
        $class = 'SomeClass';

        $object = new \stdClass();
        $object->test = '666';

        $properties = ['property0', 'property1', 'property2'];

        $generatorConfig = new Generator();
        $generatorConfig->oneForEachProperty = true;
        $generatorConfig->serializerType = "array<$class>";

        $objectGenerator = $this->createMock(ObjectGenerator::class);
        $objectGenerator->expects($this->exactly(count($properties)))
            ->method('generate')
            ->willReturn($object);

        $generatorProperty = $this->createMock(GeneratorProperty::class);
        $generatorProperty->expects($this->once())
            ->method('getGeneratorPropertyNames')
            ->with($class)
            ->willReturn($properties);

        $generator = new ObjectArrayGenerator($objectGenerator, $generatorProperty);
        $objects = $generator->generate($generatorConfig);

        $this->assertCount(count($properties), $objects);
        foreach ($objects as $receivedObject) {
            $this->assertEquals($object, $receivedObject);
        }
    }
}
