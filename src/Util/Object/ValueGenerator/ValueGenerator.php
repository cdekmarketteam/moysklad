<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\ValueGenerator;

use MoySklad\Util\Object\Annotation\Generator as GeneratorConfig;

class ValueGenerator
{
    /**
     * @var GeneratorFactory
     */
    private $generatorFactory;

    /**
     * @var GeneratorInterface[]
     */
    private $generators = [];

    public function __construct(GeneratorFactory $generatorFactory)
    {
        $this->generatorFactory = $generatorFactory;
    }

    public function generate(GeneratorConfig $generatorConfig)
    {
        return $this->getGenerator($generatorConfig->type)->generate($generatorConfig);
    }

    private function getGenerator(string $type): GeneratorInterface
    {
        if (empty($this->generators[$type])) {
            $this->generators[$type] = $this->generatorFactory->create($type);
        }

        return $this->generators[$type];
    }
}
