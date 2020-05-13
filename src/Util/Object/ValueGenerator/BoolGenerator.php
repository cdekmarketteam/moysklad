<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class BoolGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): bool
    {
        return (bool) rand(0, 1);
    }
}
