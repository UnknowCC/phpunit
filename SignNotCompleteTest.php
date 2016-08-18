<?php

/**
 * 将测试标记为未完成
 */
class SignNotCompleteTest extends PHPUnit_Framework_TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true, 'This should already word.');
        
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}