<?php

namespace MoySklad\Tests\Util\Object\ValueGenerator;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\ValueGenerator\DateTimeGenerator;
use MoySklad\Util\Object\Annotation\Generator;

class DateTimeGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new DateTimeGenerator();
        $value = $generator->generate(new Generator());

        $this->assertInstanceOf(\DateTime::class, $value);
        $this->assertGreaterThan(0, $value->getTimestamp());
    }
}
