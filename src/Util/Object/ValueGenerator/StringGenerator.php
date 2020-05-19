<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;

class StringGenerator implements GeneratorInterface
{
    public function generate(Generator $generatorConfig): string
    {
        if (!empty($generatorConfig->values)) {
            $values = array_map('trim', $generatorConfig->values);

            return $values[rand(0, count($values) - 1)];
        }

        return $this->generateRandomString($generatorConfig);
    }

    private function generateRandomString(Generator $generatorConfig): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $generatorConfig->stringLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
