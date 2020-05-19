<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\ObjectGenerator;
use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\ApiClient;
use MoySklad\Util\Object\ObjectBuilder;

class ObjectGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $class = 'SomeClassName';
        $object = new \stdClass();
        $object->test = '666';

        $generatorConfig = new Generator();
        $generatorConfig->serializerType = $class;

        $api = $this->createMock(ApiClient::class);
        $objectBuilder = $this->createMock(ObjectBuilder::class);
        $objectBuilder->expects($this->once())
            ->method('createObject')
            ->with($class, $generatorConfig->generatorProperty)
            ->willReturn($object);

        $generator = new ObjectGenerator($api, $objectBuilder);

        $this->assertEquals($object, $generator->generate($generatorConfig));
    }

    public function testGenerateWithAnyFromExists()
    {
        $class = 'SomeClassName';
        $object = new \stdClass();
        $object->test = '666';

        $generatorConfig = new Generator();
        $generatorConfig->anyFromExists = true;
        $generatorConfig->serializerType = $class;

        $api = $this->createMock(ApiClient::class);
        $api->expects($this->once())
            ->method('getAllClassObjects')
            ->willReturn([$object]);

        $objectBuilder = $this->createMock(ObjectBuilder::class);

        $generator = new ObjectGenerator($api, $objectBuilder);

        $this->assertEquals($object, $generator->generate($generatorConfig));
    }
}
