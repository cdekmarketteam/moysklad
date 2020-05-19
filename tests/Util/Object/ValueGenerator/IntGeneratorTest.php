<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\IntGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class IntGeneratorTest extends TestCase
{
    /**
     * @dataProvider intProvider
     * @param int|null $min
     * @param int|null $max
     */
    public function testGenerate(?int $min, ?int $max)
    {
        $generatorConfig = new Generator();
        $generatorConfig->min = $min ?? $generatorConfig->min;
        $generatorConfig->max = $max ?? $generatorConfig->max;

        $generator = new IntGenerator();
        $value = $generator->generate($generatorConfig);

        $this->assertIsInt($value);
        $this->assertGreaterThanOrEqual($generatorConfig->min, $value);
        $this->assertLessThanOrEqual($generatorConfig->max, $value);
    }

    public function intProvider()
    {
        return [
            [null, null],
            [1, 1],
            [1, 2],
            [1, 10],
            [1057, 1063],
        ];
    }
}
