<?php
require_once 'CaptchaService.php';
class CaptchaServiceTest extends PHPUnit_Framework_TestCase {
  function testGetCaptcha() {
    $service = new CaptchaService();
    $stubRandom = $this->getMock("Randomizer");
    $stubRandom->expects($this->any())
               ->method('pattern')
               ->will($this->returnValue(1));
    $stubRandom->expects($this->any())
               ->method('operand')
               ->will($this->returnValue(1));
    $stubRandom->expects($this->any())
               ->method('operator')
               ->will($this->returnValue(1));
    $service->setRandom($stubRandom);
    $this->assertEquals("One + 1 = 2", $service->getCaptchaString());
    //$this->assertNotEquals("One + 1 = 2", $service->getCaptchaString());
  }

}
