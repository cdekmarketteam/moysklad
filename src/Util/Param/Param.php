<?php

namespace MoySklad\Util\Param;

abstract class Param
{
    protected const CONDITIONS = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'like' => '~',
        'prefix' => '~=',
        'postfix' => '=~',
    ];

    protected const FILTER_PARAM = 'filter';
    protected const ORDER_PARAM = 'order';
    protected const LIMIT_PARAM = 'limit';
    protected const OFFSET_PARAM = 'offset';
    protected const SEARCH_PARAM = 'search';
    protected const EXPAND = 'expand';

    private const PARAM_TYPE_SEPARATOR = [
        self::FILTER_PARAM => ';',
        self::ORDER_PARAM => ';',
        self::EXPAND => ',',
    ];

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $prop
     * @return string|null
     */
    public function __get(string $prop): ?string
    {
        return $prop === 'type' ? $this->$prop : null;
    }

    /**
     * @param $prop
     * @return bool
     */
    public function __isset(string $prop) : bool
    {
        return $prop === 'type';
    }

    /**
     * @param string $paramType
     * @param Param[] $params
     * @return string
     */
    public static function renderParamString(string $paramType, array $params): string
    {
        $filteredParams = array_filter($params, function (Param $param) use ($paramType) {
            if ($param->type == $paramType) {
                return true;
            }
            return false;
        });

        $stringsOfParams = array_map(function (Param $param) {
            return $param->render();
        }, $filteredParams);

        if (array_key_exists($paramType, static::PARAM_TYPE_SEPARATOR)) {
            return implode(self::PARAM_TYPE_SEPARATOR[$paramType], $stringsOfParams);
        }

        return current($stringsOfParams);
    }

    /**
     * @return string
     */
    abstract public function render(): string;
}
