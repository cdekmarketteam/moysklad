<?php

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

interface GeneratorInterface
{
    public function generate(Generator $generatorConfig);
}
