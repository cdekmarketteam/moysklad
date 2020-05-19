<?php

namespace MoySklad\Util\Param;

class Search extends Param
{
    /**
     * @var string
     */
    public $value;

    /**
     * Search constructor.
     * @param string $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
        $this->type  = self::SEARCH_PARAM;
    }

    /**
     * @param string $value
     * @return Search
     */
    public static function eq(string $value): self
    {
        return new self($value);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%s', $this->value);
    }
}
