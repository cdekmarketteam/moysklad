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
    public function __construct(string $value)
    {
        $this->value = $value;
        $this->type = self::SEARCH_PARAM;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%s', $this->value);
    }
}
