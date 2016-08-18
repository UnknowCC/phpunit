<?php 

class DependencyFailureTest extends \PHPUnit_Framework_TestCase
{
	public function testOne()
	{
		$this->assertTrue(false);
	}

	/**
	 * @depends testOne
	 */
	public function testTwo()
	{
		
	}
}