<?php

namespace MoySklad\Util\Param;

use MoySklad\Entity\MetaEntity;

class EntityFilter extends Param
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var MetaEntity
     */
    private $value;

    /**
     * @var string
     */
    private $condition;

    /**
     * EntityFilter constructor.
     * @param string $field
     * @param MetaEntity $value
     * @param string $condition
     */
    private function __construct(string $field, MetaEntity $value, string $condition)
    {
        $this->field = $field;
        $this->value = $value;
        $this->condition = $condition;
        $this->type = self::FILTER_PARAM;
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function eq(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function neq(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function gt(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function lt(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function gte(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function lte(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function like(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function prefix(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $value
     * @return EntityFilter
     */
    public static function postfix(string $field, MetaEntity $value): self
    {
        return new self($field, $value, self::CONDITIONS[__FUNCTION__]);
    }


    /**
     * @return string
     */
    public function render(): string
    {
        $filter = $this->field.$this->condition;
        $meta = $this->value->getMeta();

        if (!is_null($meta)) {
            $filter .= $meta->href;
        }

        return $filter;
    }
}
