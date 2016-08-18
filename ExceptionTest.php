<?php

class ExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testException()
    {
        // $this->expectException(InvalidArgumentException::class);
    }
}