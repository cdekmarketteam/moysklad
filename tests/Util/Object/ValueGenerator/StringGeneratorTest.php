<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\StringGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class StringGeneratorTest extends TestCase
{
    /**
     * @dataProvider stringProvider
     * @param int|null $stringLength
     */
    public function testGenerate(?int $stringLength)
    {
        $generatorConfig = new Generator();
        $generatorConfig->stringLength = $stringLength;

        $generator = new StringGenerator();
        $value = $generator->generate($generatorConfig);

        $this->assertIsString($value);
        $this->assertEquals($stringLength, strlen($value));
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

    public function testGenerateWithValues()
    {
        $values = ['ferwf343', 'fgre4t33t3', '3t3gwrgrwegwe'];
        $generatorConfig = new Generator();
        $generatorConfig->values = $values;

        $generator = new StringGenerator();

        $this->assertContains($generator->generate($generatorConfig), $values);
    }
}
