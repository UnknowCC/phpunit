<?php

/**
 * 多重依赖测试
 */
class MultipleDependenciesTest extends \PHPUnit_Framework_TestCase 
{
    public function testProduceFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }
    
    public function testProduceSecond() 
    {
        $this->assertTrue(true);
        return 'second';
    }
    
    /**
     * @depends testProduceFirst
     * @depends testProduceSecond
     */
    public function testConsumer() 
    {
        $this->assertEquals(['first', 'second'], func_get_args());
    }
}