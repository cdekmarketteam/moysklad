<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class IntGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): int
    {
        return rand($generatorConfig->min, $generatorConfig->max);
    }
}
