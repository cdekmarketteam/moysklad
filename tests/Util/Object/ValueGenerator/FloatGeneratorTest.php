<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\FloatGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class FloatGeneratorTest extends TestCase
{
    /**
     * @dataProvider floatProvider
     * @param float|null $min
     * @param float|null $max
     */
    public function testGenerate(?float $min, ?float $max)
    {
        $generatorConfig = new Generator();
        $generatorConfig->min = $min ?? $generatorConfig->min;
        $generatorConfig->max = $max ?? $generatorConfig->max;

        $generator = new FloatGenerator();
        $value = $generator->generate($generatorConfig);

        $this->assertIsFloat($value);
        $this->assertGreaterThanOrEqual($generatorConfig->min, $value);
        $this->assertLessThanOrEqual($generatorConfig->max, $value);
    }

    public function floatProvider()
    {
        return [
            [null, null],
            [0.01, 0.02],
            [0.1, 0.2],
            [0.1, 0.1],
            [1.0, 10.0],
        ];
    }
}
