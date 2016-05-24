<?php

namespace Andychey\Util;


class Str
{
    /**
     * 截取字符串至指定宽度
     *
     * @param $str
     * @param $width
     * @param string $trimmarker
     *
     * @return string
     */
    public static function strimwidth($str, $width, $trimmarker = '')
    {
        return mb_strimwidth($str, 0, $width, $trimmarker);
    }
}