<?php

/**
 * 对会引发PHP错误的代码的返回值进行测试
 */
class ErrorSuppressionTest extends PHPUnit_Framework_TestCase
{
    public function testFileWriting() 
    {
        $writer = new fileWriter;
        $this->assertFalse(@$writer->write('/is-not-writable/file', 'stuff'));
    }
}

class FileWriter
{
    public function write($file, $content) 
    {
        $file = fopen($file, 'w');
        if ($file == false) {
            return false;
        }
    }
}