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
    private function __construct(int $offset)
    {
        $this->offset = $offset;
        $this->type = self::OFFSET_PARAM;
    }

    /**
     * @param int $offset
     * @return Offset
     */
    public static function eq(int $offset): self
    {
        return new self($offset);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%d', $this->offset);
    }
}
