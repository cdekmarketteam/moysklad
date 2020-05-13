<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\BoolGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class BoolGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new BoolGenerator();

        $this->assertIsBool($generator->generate(new Generator()));
    }
}
