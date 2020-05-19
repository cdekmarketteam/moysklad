<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class FloatGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): float
    {
        return rand(intval($generatorConfig->min * 100), intval($generatorConfig->max * 100)) / 100;
    }
}
