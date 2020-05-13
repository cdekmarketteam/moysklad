<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator;
use MoySklad\Util\Object\GeneratorProperty;

class ObjectArrayGenerator implements GeneratorInterface
{
    /**
     * @var ObjectGenerator
     */
    private $objectGenerator;

    /**
     * @var GeneratorProperty
     */
    private $generatorProperty;

    public function __construct(ObjectGenerator $objectGenerator, GeneratorProperty $generatorProperty)
    {
        $this->objectGenerator   = $objectGenerator;
        $this->generatorProperty = $generatorProperty;
    }

    public function generate(Generator $generatorConfig): array
    {
        $class = str_replace(['array<', '>'], '', $generatorConfig->serializerType);
        $generatorConfigClone = clone $generatorConfig;
        $generatorConfigClone->serializerType = $class;

        $objects = [];
        if ($generatorConfig->oneForEachProperty) {
            foreach ($this->generatorProperty->getGeneratorPropertyNames($class) as $property) {
                $generatorConfigClone->generatorProperty = $property;
                $objects[] = $this->objectGenerator->generate($generatorConfigClone);
            }
        } else {
            for ($i = 0; $i < $generatorConfig->objectQuantity; $i++) {
                $objects[] = $this->objectGenerator->generate($generatorConfigClone);
            }
        }

        return $objects;
    }
}
