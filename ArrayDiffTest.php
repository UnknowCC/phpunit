<?php

/**
 * 数组比较失败时生成的错误相关信息输出
 */
class ArrayDifferTest extends PHPUnit_Framework_TestCase
{
    public function testEquality()
    {
        $this->assertEquals(
            [1, 2, 3, 4, 5, 6],
            [1, 2, 33, 4, 5, 6]
        );
    }
}