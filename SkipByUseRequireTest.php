<?php

/**
 * @requires extension mysqli
 */
class SkipByUseRequireTest extends PHPUnit_Framework_TestCase
{
    /**
     * @require PHP 5.3
     */
    public function testConnection()
    {
        // 测试要求有 mysqli 扩展，并且 PHP >= 5.3
    }
    
    // ... 所有其他要求有mysqli扩展的测试
}