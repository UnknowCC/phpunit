<?php

/**
 * 对函数或方法的输出进行测试
 */
class OutputTest extends PHPUnit_Framework_TestCase
{
    public function testExceptionFooActualFoo() 
    {
        $this->expectOutputString('foo');
        print 'foo';
    }
    
    public function testExpectBarActualBaz() 
    {
        $this->expectOutputString('bar');
        print 'baz';
    }
}