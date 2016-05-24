<?php

namespace Andychey\Util;


class StrTest extends \PHPUnit_Framework_TestCase
{
    public function testStrimwidth()
    {
        $str1 = '未达截取宽度';
        $this->assertEquals($str1, Str::strimwidth($str1, 15));
        $this->assertEquals($str1, Str::strimwidth($str1, 15, '...'));

        $str1 = '达到截取宽度';
        $this->assertEquals('达到截取宽', Str::strimwidth($str1, 11));
        $this->assertEquals('达到截取...', Str::strimwidth($str1, 11, '...'));
    }
}
