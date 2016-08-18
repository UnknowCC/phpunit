<?php

/**
 * 对PHP错误进行测试
 *  用 expectedException 来预期PHP错误
 */
class ExpectedErrorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}