<?php

declare(strict_types=1);

namespace MoySklad\Util\Object;

class ObjectCollection
{
    /**
     * @var array
     */
    private $objects = [];

    public function add(object $object)
    {
        $this->objects[] = $object;
    }

    public function getAll(): array
    {
        return $this->objects;
    }
}
