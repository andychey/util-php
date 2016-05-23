<?php

namespace Andychey\Util;


class Client
{
    /**
     * 获取客户端ip地址
     * 
     * @return string
     */
    public static function getIp()
    {
        $ip = $unknown = 'unknown';
        if (! empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (! empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if (false !== strpos($ip, ',')) {
            $ip = reset(explode(',', $ip));
        }
        return $ip;
    }

    /**
     * 判断是否ajax请求
     * 
     * @return bool
     */
    public static function isAjax()
    {
        return isset($_SERVER["HTTP_X_REQUESTED_WITH"]) &&
            'xmlhttprequest' === strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]);
    }

    /**
     * 是否为命令行
     *
     * @return bool
     */
    public static function isCli()
    {
        return 'cli' === PHP_SAPI || defined('STDIN');
    }

    /**
     * 是否为微信
     *
     * @return bool
     */
    public static function isWeChat()
    {
        return false !== stripos(self::getUserAgent(), 'micromessenger') ||
            false !== stripos(self::getUserAgent(), 'wechatdevtools');
    }
    
    /**
     * 是否为chrome
     *
     * @return int
     */
    public static function isChrome()
    {
        return false !== stripos(self::getUserAgent(), 'chrome');
    }

    /**
     * 判断是否为火狐浏览器
     */
    public static function isFirefox()
    {
        return false !== stripos(self::getUserAgent(), 'firefox');
    }

    /**
     * 判断是否ie浏览器
     *
     * @return int
     */
    public static function isIE()
    {
        return false !== stripos(self::getUserAgent(), 'trident');
    }

    /**
     * 获取 Usage-Agent
     *
     * @return mixed
     */
    public static function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }
}