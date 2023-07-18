<?php
namespace MoySklad\Util\Serializer;

class MixedSerializeHandler
{
    /**
     * @param $visitor
     * @param mixed $value
     * @param array $type
     * @return array|mixed
     */
    public function __invoke($visitor, $value, array $type)
    {
        return $value;
    }
}
