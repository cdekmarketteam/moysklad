<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class NegativeIntGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): int
    {
        return rand($generatorConfig->negativeMax, $generatorConfig->negativeMin);
    }
}
