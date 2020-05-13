<?php

declare(strict_types=1);

namespace MoySklad\Util\Object\Annotation;

/**
 * @Annotation
 * @Target({"PROPERTY"})
 */
final class Generator
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $serializerType;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string[]
     */
    public $values;

    /**
     * @var array
     * Example annotation: setNullIfNotIn={"propertyName": {"value1", "value2"}}
     * so if the value of the property 'propertyName' equals to value1 or value2,
     * then the annotated property will be set into null
     */
    public $setNullIfNotIn;

    /**
     * @var bool
     * If true, then the value will be set as any of existing objects
     */
    public $anyFromExists;

    /**
     * @var int
     */
    public $objectQuantity = 1;

    /**
     * @var bool
     * If true, then objects will be created one from each property of the class
     */
    public $oneForEachProperty;

    /**
     * @var int
     */
    public $min = 1;

    /**
     * @var int
     */
    public $max = 1000;

    /**
     * @var int
     */
    public $negativeMin = -1000;

    /**
     * @var int
     */
    public $negativeMax = -1;

    /**
     * @var int
     */
    public $stringLength = 7;

    /**
     * @var int
     */
    public $stringQuantity = 7;

    /**
     * @var string
     */
    public $generatorProperty;
}
