<?php

/**
 * 数据供给器
 *  带有命名数据集的数据供给器
 */
class DataTest extends \PHPUnit_Framework_TestCase 
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }
    
    
    public function additionProvider() 
    {
        return [
            'adding zeros' => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one' => [1, 1, 3]
        ];
    }
}