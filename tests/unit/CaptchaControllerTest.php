<?php
class CaptchaConrollerTest extends PHPUnit_Framework_TestCase {
	function testCaptcha() {
		$controller = new CaptchaController();
		$mockCaptchaService = $this->getMock('CaptchaService');
		$mockCaptchaService->expects($this->once())
						   ->method('getCaptchaString')
						   ->will($this->returnValue('One + 1 = 2'));
		$controller->setCaptchaService($mockCaptchaService);
	   	$this->assertEquals('One + 1 = 2', $controller->captcha());
	}
}