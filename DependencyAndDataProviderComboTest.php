<?php

/**
 * 在同一个测试中组合使用 depends 和 dataProvider
 */
class DependencyAndDataProviderComboTest extends PHPUnit_Framework_TestCase
{
    
    public function provider()
    {
        return [['provider1'], ['provider2']];
    }
    
    public function testProducerFirst() 
    {
        $this->assertTrue(true);
        return 'first';
    }
    
    public function testProducerSecond() 
    {
        $this->assertTrue(true);
        return 'second';
    }
    
    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer() 
    {
        $this->assertEquals(
            ['provider1', 'first', 'second'],
            func_get_args()
        );
    }
}