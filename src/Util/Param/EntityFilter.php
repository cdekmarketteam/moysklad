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
     * @param MetaEntity $metaEntity
     * @return EntityFilter
     */
    public static function eq(string $field, MetaEntity $metaEntity): self
    {
        return new self($field, $metaEntity, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @param string $field
     * @param MetaEntity $metaEntity
     * @return EntityFilter
     */
    public static function neq(string $field, MetaEntity $metaEntity): self
    {
        return new self($field, $metaEntity, self::CONDITIONS[__FUNCTION__]);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->field . $this->condition . $this->value->{$this->field};
    }
}
