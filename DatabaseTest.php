<?php

/**
 * 在同一个测试套件内的不同测试之间共享基境
 */
class DatabaseTest extends PHPUnit_Framework_TestCase
{
    protected static $dbh;
    
    public static function setUpBeforeClass() 
    {
        self::$dbh = new PDO('sqlite::memory:');
    }
    
    public static function tearDownAfterClass() 
    {
        self::$dbh = null;
    }
}