<?php

namespace MoySklad\Util\Param;

/**
 * Class Expand
 *
 * Параметр с дополнительным полем
 *
 * @project ms-lib
 * @date 30.09.2020 10:03
 * @author Viktor.Fursenko
 */
class Expand extends Param
{
    /**
     * @var string
     */
    public $expand;

    /**
     * Extra-fields params constructor
     *
     * @param string $expand
     */
    private function __construct(string $expand)
    {
        $this->expand = $expand;
        $this->type = self::EXPAND;
    }

    /**
     * @param string $expand
     * @return static
     */
    public static function eq(string $expand): self
    {
        return new self($expand);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->expand;
    }
}
