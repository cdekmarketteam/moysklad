<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\ValueGenerator;
use MoySklad\Util\Object\ValueGenerator\GeneratorFactory;
use MoySklad\Util\Object\ValueGenerator\GeneratorInterface;
use MoySklad\Util\Object\Annotation\Generator;

class ValueGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $type = 'test type';
        $value = 13666;

        $generatorConfig = new Generator();
        $generatorConfig->type = $type;

        $generator = $this->createMock(GeneratorInterface::class);
        $generator->expects($this->exactly(2))
            ->method('generate')
            ->with($generatorConfig)
            ->willReturn($value);

        $generatorFactory = $this->createMock(GeneratorFactory::class);
        $generatorFactory->expects($this->once())
            ->method('create')
            ->with($type)
            ->willReturn($generator);

        $valueGenerator = new ValueGenerator($generatorFactory);

        $this->assertEquals($value, $valueGenerator->generate($generatorConfig));

        // second call to check that method 'create' of GeneratorFactory was called only once
        // (see above expects($this->once()))
        $this->assertEquals($value, $valueGenerator->generate($generatorConfig));
    }
}
