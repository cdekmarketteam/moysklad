<?php

namespace MoySklad\Util\Param;

class StandardFilter extends Param
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $condition;

    /**
     * StandardFilter constructor.
     * @param string $field
     * @param string $value
     * @param string $condition
     */
    private function __construct(string $field, string $value, string $condition)
    {
        $this->field     = $field;
        $this->value     = $value;
        $this->condition = $condition;
        $this->type      = self::FILTER_PARAM;
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function eq(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function neq(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function gt(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function lt(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function gte(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function lte(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function like(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function prefix(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param string $value
     * @return StandardFilter
     */
    public static function postfix(string $field, string $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->field . $this->condition . $this->value;
    }
}
