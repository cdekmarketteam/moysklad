<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use MoySklad\Util\Object\ValueGenerator\StringGenerator;
use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\StringArrayGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class StringArrayGeneratorTest extends TestCase
{
    /**
     * @dataProvider stringProvider
     * @param int|null $stringQuantity
     */
    public function testGenerate(?int $stringQuantity)
    {
        $generatorConfig = new Generator();
        $generatorConfig->stringLength = 666;
        $generatorConfig->stringQuantity = $stringQuantity;

        $testSting = 'test string';
        $expectedStrings = array_fill(0, $stringQuantity, $testSting);

        $stringGenerator = $this->createMock(StringGenerator::class);
        $stringGenerator
            ->expects($this->exactly($stringQuantity))
            ->method('generate')
            ->with($generatorConfig)
            ->willReturn($testSting);

        $generator = new StringArrayGenerator($stringGenerator);
        $values = $generator->generate($generatorConfig);

        $this->assertEquals($expectedStrings, $values);
    }

    public function stringProvider()
    {
        return [
            [0],
            [1],
            [5],
            [13],
        ];
    }
}
