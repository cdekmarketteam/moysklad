<?php

namespace MoySklad\Util\Param;

class Limit extends Param
{
    private const MIN_LIMIT = 1;
    private const MAX_LIMIT = 1000;

    /**
     * @var int
     */
    public $limit;

    /**
     * Pagination constructor.
     * @param int $limit
     */
    private function __construct(int $limit)
    {
        if ($limit < self::MIN_LIMIT || $limit > self::MAX_LIMIT) {
            throw new \InvalidArgumentException('Allowed values range 1 - 1000');
        }

        $this->limit = $limit;
        $this->type = self::LIMIT_PARAM;
    }

    /**
     * @param int $limit
     * @return Limit
     */
    public static function eq(int $limit): self
    {
        return new self($limit);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return sprintf('%d', $this->limit);
    }
}
