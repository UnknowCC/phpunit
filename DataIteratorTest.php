<?php

/**
 * 迭代器对象的数据供给器
 */

require 'CsvFileIterator.php';

class DataIterator extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd()
    {
        $this->assertEquals($expected, $a + $b);
    }
    
    public function additionProvider() 
    {
        return new CsvFileIterator('data.csv');
    }
}