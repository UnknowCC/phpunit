<?php

/**
 * 长数组比较失败时生成的错误相关信息输出
 */
class LongArrayDiffTest extends PHPUnit_Framework_TestCase
{
    public function testEquality()
    {
        $this->assertEquals(
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2,  3, 4, 5, 6],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 33, 4, 5, 6]
        );
    }
}