<?php

namespace Andychey\Util;


class DateTest extends \PHPUnit_Framework_TestCase
{
    public function testHumanTime()
    {
        $now = time();
        $this->assertEquals('刚刚', Date::humanTime($now - 59));
        $this->assertEquals('3分钟前', Date::humanTime($now - 181));
        $this->assertEquals('1小时前', Date::humanTime($now - 3601));
        $this->assertEquals('昨天', Date::humanTime($now - 86401));
        $this->assertEquals('前天', Date::humanTime($now - 259199));
    }
}
