<?php

namespace MoySklad\Util;

trait StringsTrait
{
    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public function startsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);

        return (substr($haystack, 0, $length) === $needle);
    }

    /**
     * @param $haystack
     * @param $needle
     * @return bool
     */
    public function endsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
