<?php

namespace MoySklad\Util\Param;

class Limit extends Param
{
    /**
     * @var int
     */
    public $limit;

    /**
     * Pagination constructor.
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
        $this->type = self::LIMIT_PARAM;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%d', $this->limit);
    }
}
