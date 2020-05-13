<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;
use DateTime;

class DateTimeGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): DateTime
    {
        return new DateTime();
    }
}
