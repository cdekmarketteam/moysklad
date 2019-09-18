<?php

namespace MoySklad\Util\Param;

class Pagination extends Param
{
    /**
     * @var int
     */
    public $limit;

    /**
     * @var int
     */
    public $offset;

    /**
     * Pagination constructor.
     * @param int $limit
     * @param int $offset
     */
    public function __construct(int $limit, int $offset)
    {
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function render(): string
    {
        return sprintf('limit=%d&offset=%d', $this->limit, $this->offset);
    }
}
