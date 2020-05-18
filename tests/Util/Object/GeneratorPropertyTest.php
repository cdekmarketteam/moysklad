<?php

namespace MoySklad\Tests\Util\Object;

use PHPUnit\Framework\TestCase;
use MoySklad\Util\Object\Annotation\Generator;
use JMS\Serializer\Annotation\Type;
use MoySklad\Util\Object\GeneratorProperty;

class GeneratorPropertyTest extends TestCase
{
    public function testGetGeneratorProperties()
    {
        $generatorProperty = new GeneratorProperty();
        $generatorProperties = $generatorProperty->getGeneratorProperties(GeneratorPropertyDummy::class);

        $this->assertCount(3, $generatorProperties);

        $this->assertArrayHasKey('generatorPropertyA', $generatorProperties);
        $this->assertArrayHasKey('generatorPropertyB', $generatorProperties);
        $this->assertArrayHasKey('generatorPropertyC', $generatorProperties);

        $this->assertEquals('string', $generatorProperties['generatorPropertyA']->serializerType);
        $this->assertEquals('string', $generatorProperties['generatorPropertyA']->type);

        $this->assertEquals('int', $generatorProperties['generatorPropertyB']->serializerType);
        $this->assertEquals('typeB', $generatorProperties['generatorPropertyB']->type);

        $this->assertEquals('bool', $generatorProperties['generatorPropertyC']->serializerType);
        $this->assertEquals('typeC', $generatorProperties['generatorPropertyC']->type);
    }

    public function testGetGeneratorPropertiesWithExclude()
    {
        $exclude = ['generatorPropertyA', 'generatorPropertyC'];

        $generatorProperty = new GeneratorProperty();
        $generatorProperties = $generatorProperty->getGeneratorProperties(GeneratorPropertyDummy::class, $exclude);

        $this->assertCount(1, $generatorProperties);
        $this->assertArrayHasKey('generatorPropertyB', $generatorProperties);
        $this->assertArrayNotHasKey('generatorPropertyA', $generatorProperties);
        $this->assertArrayNotHasKey('generatorPropertyC', $generatorProperties);
    }

    public function testGetGeneratorPropertyNames()
    {
        $generatorProperty = new GeneratorProperty();
        $generatorProperties = $generatorProperty->getGeneratorPropertyNames(GeneratorPropertyDummy::class);

        $expectedGeneratorProperties = ['generatorPropertyA', 'generatorPropertyB', 'generatorPropertyC'];
        $this->assertEquals($expectedGeneratorProperties, $generatorProperties);
    }
}

class GeneratorPropertyDummy
{
    /**
     * @Type("string")
     */
    public $notGeneratorPropertyA;

    /**
     * @Generator()
     */
    public $notGeneratorPropertyB;

    /**
     * @Type("string")
     * @Generator()
     */
    public $generatorPropertyA;

    /**
     * @Type("int")
     * @Generator(type="typeB")
     */
    public $generatorPropertyB;

    /**
     * @Type("bool")
     * @Generator(type="typeC")
     */
    public $generatorPropertyC;
}
