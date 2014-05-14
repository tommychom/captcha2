<?php 
require_once "Captcha.php";
class CaptchaTest extends PHPUnit_Framework_TestCase {
	function testPatternOneOperatorPlus(){
		$this->assertEquals('One + 1 = 2',numberToString(1,1,1,1));
	}

	function testPatternOneOperatorMultiply(){
		$this->assertEquals('One * 1 = 1',numberToString(1,1,2,1));
	}

	function testPatternOneOperatorMinus(){
		$this->assertEquals('Nine - 1 = 8',numberToString(1,9,3,1));
	}

	function testPatternTwoOperatorPlus(){
		$this->assertEquals('1 + One = 2',numberToString(2,1,1,1));
	}
	
	function testPatternTwoOperatorMultiply(){
		$this->assertEquals('1 * One = 1',numberToString(2,1,2,1));
	}


	function testPatternTwoOperatorMinus(){
		$this->assertEquals('1 - One = 0',numberToString(2,1,3,1));
	}
}