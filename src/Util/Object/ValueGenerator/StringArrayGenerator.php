<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class StringArrayGenerator implements GeneratorInterface
{
    /**
     * @var StringGenerator
     */
    private $stringGenerator;

    public function __construct(StringGenerator $stringGenerator)
    {
        $this->stringGenerator = $stringGenerator;
    }

    public function generate(Generator $generatorConfig): array
    {
        $strings = [];
        for ($i = 0; $i < $generatorConfig->stringQuantity; $i++) {
            $strings[] = $this->stringGenerator->generate($generatorConfig);
        }

        return $strings;
    }
}
