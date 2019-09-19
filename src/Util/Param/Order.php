<?php

namespace MoySklad\Util\Param;

class Order extends Param
{
    /**
     * @var string
     */
    public $field;

    /**
     * @var string
     */
    public $direction;

    /**
     * Order constructor.
     * @param string $field
     * @param string $direction
     */
    private function __construct(string $field, string $direction)
    {
        $this->field = $field;
        $this->direction = $direction;
        $this->type = self::ORDER_PARAM;
    }

    /**
     * @param string $field
     * @return Order
     */
    public static function asc(string $field): self
    {
        return new self($field, __FUNCTION__);
    }

    /**
     * @param string $field
     * @return Order
     */
    public static function desc(string $field): self
    {
        return new self($field, __FUNCTION__);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%s,%s', $this->field, $this->direction);
    }
}
