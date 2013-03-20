<?php
// src/Acme/DemoBundle/Tests/Utility/CalculatorTest.php
namespace Acme\DemoBundle\Tests\Utility;

use Acme\DemoBundle\Utility\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase{
	public function testAdd(){
		$calc = new Calculator();
		$result = $calc->add(30,12);
		
		//assert that your calcualator added the numbers correctly
		$this->assertEquals(42,$result);	
	}
	
	public function testMultiply(){
		$calc = new Calculator();
		$result = $calc->multiply(3,12);
		
		//assert that your calcualator multiplies the numbers correctly
		$this->assertEquals(36,$result);	
	}
	
	public function testSubstract(){
		$calc = new Calculator();
		$result = $calc->substract(30,12);
		
		//assert that your calcualator substracted the numbers correctly
		$this->assertEquals(18,$result);	
	}
	
	public function testDivide(){
		$calc = new Calculator();
		$result = $calc->divide(30,3);
		
		//assert that your calcualator divided the numbers correctly
		$this->assertEquals(10,$result);	
	}
	
	public function testFirstIsInteger(){
		$calc = new Calculator();
		$this->assertInternalType('int',$calc->getFirst());
	}
	
	public function testFile_arrayIsArray(){
		$calc = new Calculator();
		$this->assertInternalType('array',$calc->getFile_array());
	}
	
	public function testArray_fileHasKey(){
		$calc = new Calculator();
		$calc->fileToArray();
		$this->assertArrayHasKey(0,$calc->getFile_array());
	}
		
}
