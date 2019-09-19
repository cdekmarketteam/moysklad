<?php

namespace MoySklad\Util\Param;

class Offset extends Param
{
    /**
     * @var int
     */
    public $offset;

    /**
     * Pagination constructor.
     * @param int $offset
     */
    public function __construct(int $offset)
    {
        $this->offset = $offset;
        $this->type = self::OFFSET_PARAM;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%d', $this->offset);
    }
}
