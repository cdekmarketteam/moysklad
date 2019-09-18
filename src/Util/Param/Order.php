<?php

namespace MoySklad\Util\Param;

class Order extends Param
{
    public const DIRECTION = [
        'asc' => 'asc',
        'desc' => 'desc',
    ];

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
    public function __construct(string $field, string $direction)
    {
        if (!isset(self::DIRECTION[strtolower($direction)])) {
            throw new \InvalidArgumentException('Unsupported direction value');
        }

        $this->field = $field;
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('order=%s,%s', $this->field, $this->direction);
    }
}
