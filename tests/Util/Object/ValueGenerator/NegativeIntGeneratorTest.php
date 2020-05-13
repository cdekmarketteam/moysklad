<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\NegativeIntGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class NegativeIntGeneratorTest extends TestCase
{
    /**
     * @dataProvider intProvider
     * @param int|null $negativeMin
     * @param int|null $negativeMax
     */
    public function testGenerate(?int $negativeMin, ?int $negativeMax)
    {
        $generatorConfig = new Generator();
        $generatorConfig->negativeMin = $negativeMin ?? $generatorConfig->negativeMin;
        $generatorConfig->negativeMax = $negativeMax ?? $generatorConfig->negativeMax;

        $generator = new NegativeIntGenerator();
        $value = $generator->generate($generatorConfig);

        $this->assertIsInt($value);
        $this->assertLessThan(0, $value);
        $this->assertGreaterThanOrEqual($generatorConfig->negativeMin, $value);
        $this->assertLessThanOrEqual($generatorConfig->negativeMax, $value);
    }

    public function intProvider()
    {
        return [
            [null, null],
            [-1, -1],
            [-2, -1],
            [-10, -1],
            [-1063, -1057],
        ];
    }
}
