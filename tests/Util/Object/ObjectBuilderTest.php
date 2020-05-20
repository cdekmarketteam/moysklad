<?php

namespace MoySklad\Tests\Util\Object;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ObjectBuilder;
use MoySklad\Util\Object\ObjectCollection;
use MoySklad\Util\Object\GeneratorProperty;
use MoySklad\Util\Object\ValueGenerator\ValueGenerator;
use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\ApiClient;

class ObjectBuilderTest extends TestCase
{
    /**
     * @var MockObject|ApiClient
     */
    protected $api;

    /**
     * @var MockObject|ObjectCollection
     */
    protected $objectCollection;

    /**
     * @var MockObject|GeneratorProperty
     */
    protected $generatorProperty;

    /**
     * @var MockObject|ValueGenerator
     */
    protected $valueGenerator;

    /**
     * @var ObjectBuilder
     */
    protected $objectBuilder;

    public function setUp(): void
    {
        $this->api               = $this->createMock(ApiClient::class);
        $this->objectCollection  = $this->createMock(ObjectCollection::class);
        $this->generatorProperty = $this->createMock(GeneratorProperty::class);
        $this->valueGenerator    = $this->createMock(ValueGenerator::class);
        $this->objectBuilder     = new ObjectBuilder(
            $this->api,
            $this->objectCollection,
            $this->generatorProperty,
            $this->valueGenerator
        );
    }

    public function testBuild()
    {
        $generator0 = new Generator();
        $generator0->type = 'type0';
        $generator1 = new Generator();
        $generator1->type = 'type1';

        $generatorProperties = [
            'property0' => $generator0,
            'property1' => $generator1,
        ];
        $propertyValue0 = 'value0';
        $propertyValue1 = 'value1';

        $this->generatorProperty->expects($this->once())
            ->method('getGeneratorProperties')
            ->with(ObjectGeneratorDummy::class, [])
            ->willReturn($generatorProperties);

        $this->valueGenerator->expects($this->exactly(count($generatorProperties)))
            ->method('generate')
            ->withConsecutive([$generator0], [$generator1])
            ->willReturnOnConsecutiveCalls($propertyValue0, $propertyValue1);

        $builtObject = $this->objectBuilder->build(ObjectGeneratorDummy::class);

        $this->assertIsObject($builtObject);
        $this->assertInstanceOf(ObjectGeneratorDummy::class, $builtObject);
        $this->assertEquals($propertyValue0, $builtObject->property0);
        $this->assertEquals($propertyValue1, $builtObject->property1);
    }

    public function testBuildWithPropertyValues()
    {
        $generator0 = new Generator();
        $generator0->type = 'type0';
        $generator1 = new Generator();
        $generator1->type = 'type1';

        $generatorProperties = [
            'property0' => $generator0,
            'property1' => $generator1,
        ];
        $propertyValue0 = 'value0';
        $propertyValue1 = 'value1';

        $propertyValues = ['property1' => 'another value'];

        $this->generatorProperty->expects($this->once())
            ->method('getGeneratorProperties')
            ->with(ObjectGeneratorDummy::class, [])
            ->willReturn($generatorProperties);

        $this->valueGenerator->expects($this->exactly(count($generatorProperties)))
            ->method('generate')
            ->withConsecutive([$generator0], [$generator1])
            ->willReturnOnConsecutiveCalls($propertyValue0, $propertyValue1);

        $builtObject = $this->objectBuilder->build(ObjectGeneratorDummy::class, $propertyValues);

        $this->assertIsObject($builtObject);
        $this->assertInstanceOf(ObjectGeneratorDummy::class, $builtObject);
        $this->assertEquals($propertyValue0, $builtObject->property0);
        $this->assertEquals($propertyValues['property1'], $builtObject->property1);
    }

    public function testBuildWithExcludeProperties()
    {
        $generator1 = new Generator();
        $generator1->type = 'type1';

        $generatorProperties = [
            'property1' => $generator1,
        ];
        $propertyValue0 = 'value0';
        $propertyValue1 = 'value1';

        $excludeProperties = ['property0'];

        $this->generatorProperty->expects($this->once())
            ->method('getGeneratorProperties')
            ->with(ObjectGeneratorDummy::class, $excludeProperties)
            ->willReturn($generatorProperties);

        $this->valueGenerator->expects($this->exactly(count($generatorProperties)))
            ->method('generate')
            ->withConsecutive([$generator1])
            ->willReturnOnConsecutiveCalls($propertyValue1);

        $builtObject = $this->objectBuilder->build(ObjectGeneratorDummy::class, [], $excludeProperties);

        $this->assertIsObject($builtObject);
        $this->assertInstanceOf(ObjectGeneratorDummy::class, $builtObject);
        $this->assertEquals(null, $builtObject->property0);
        $this->assertEquals($propertyValue1, $builtObject->property1);
    }

    public function testBuildWithProperty()
    {
        $generator0 = new Generator();
        $generator0->type = 'type0';
        $generator1 = new Generator();
        $generator1->type = 'type1';

        $generatorProperties = [
            'property0' => $generator0,
            'property1' => $generator1,
        ];
        $propertyValue0 = 'value0';
        $propertyValue1 = 'value1';

        $this->generatorProperty->expects($this->once())
            ->method('getGeneratorProperties')
            ->with(ObjectGeneratorDummy::class, [])
            ->willReturn($generatorProperties);

        $this->valueGenerator->expects($this->once())
            ->method('generate')
            ->withConsecutive([$generator1])
            ->willReturnOnConsecutiveCalls($propertyValue1);

        $builtObject = $this->objectBuilder->build(ObjectGeneratorDummy::class, [], [], 'property1');

        $this->assertIsObject($builtObject);
        $this->assertInstanceOf(ObjectGeneratorDummy::class, $builtObject);
        $this->assertEquals(null, $builtObject->property0);
        $this->assertEquals($propertyValue1, $builtObject->property1);
    }

    /**
     * @dataProvider setNullIfNotInProvider
     * @param mixed $value0
     * @param mixed $value1
     * @param mixed $value2
     * @param array $notIn
     * @param mixed $expectedValue0
     * @param mixed $expectedValue1
     * @param mixed $expectedValue2
     */
    public function testBuildWithSetNullIfNotIn(
        $value0,
        $value1,
        $value2,
        array $notIn,
        $expectedValue0,
        $expectedValue1,
        $expectedValue2
    ) {
        $generator0 = new Generator();
        $generator0->type = 'type0';

        $generator1 = new Generator();
        $generator1->type = 'type1';
        $generator1->setNullIfNotIn = $notIn;

        $generator2 = new Generator();
        $generator2->type = 'type2';


        $generatorProperties = [
            'property0' => $generator0,
            'property1' => $generator1,
            'property2' => $generator2,
        ];

        $this->generatorProperty->expects($this->once())
            ->method('getGeneratorProperties')
            ->with(ObjectGeneratorDummy::class, [])
            ->willReturn($generatorProperties);

        $this->valueGenerator->expects($this->exactly(count($generatorProperties)))
            ->method('generate')
            ->withConsecutive([$generator0], [$generator1], [$generator2])
            ->willReturnOnConsecutiveCalls($value0, $value1, $value2);

        $builtObject = $this->objectBuilder->build(ObjectGeneratorDummy::class);

        $this->assertIsObject($builtObject);
        $this->assertInstanceOf(ObjectGeneratorDummy::class, $builtObject);
        $this->assertEquals($value0, $builtObject->property0);
        $this->assertEquals($expectedValue1, $builtObject->property1);
        $this->assertEquals($value2, $builtObject->property2);
    }

    public function setNullIfNotInProvider()
    {
        return [
            // one property in "notIn"
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['value0'],
                ],
                'value0',
                'value1',
                'value2',
            ],
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['value0', 'not value0'],
                ],
                'value0',
                'value1',
                'value2',
            ],
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['not value0'],
                ],
                'value0',
                null,
                'value2',
            ],

            // two properties in "notIn"
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['value0'],
                    'property2' => ['value2'],
                ],
                'value0',
                'value1',
                'value2',
            ],
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['value0'],
                    'property2' => ['not value2'],
                ],
                'value0',
                'value1',
                'value2',
            ],
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['not value0'],
                    'property2' => ['value2'],
                ],
                'value0',
                'value1',
                'value2',
            ],
            [
                'value0',
                'value1',
                'value2',
                [
                    'property0' => ['not value0'],
                    'property2' => ['not value2'],
                ],
                'value0',
                null,
                'value2',
            ],
        ];
    }
}

class ObjectGeneratorDummy
{
    public $property0;
    public $property1;
}

