<?php

namespace Andychey\Util;


class Date
{
    /**
     * 人性化的时间描述
     *
     * @param $time
     *
     * @return string
     */
    public static function humanTime($time)
    {
        $interval = time() - $time;
        if ($interval < 60) {
            $desc = '刚刚';
        } else if ($interval < 3600) {
            $desc = floor($interval / 60) . '分钟前';
        } else if ($interval < 86400) {
            $desc = floor($interval / 3600) . '小时前';
        } else if ($interval < 172800) {
            $desc = '昨天';
        } else if ($interval < 259200) {
            $desc = '前天';
        } else {
            $desc = '3天前';
        }
        return $desc;
    }
}