<?php
require_once 'Captcha.php';
require_once 'Randomizer.php';
class CaptchaService {
  private $random;
  function setRandom($random) {
    $this->random = $random;
  }
  function __construct() {
    $this->random = new Randomizer();
  }
  function getCaptchaString() {
    $captcha = new Captcha();
    $captcha->getCaptcha($this->random->pattern(), $this->random->operand(), 
       $this->random->operator(), $this->random->operand());
    return $captcha->toString();
  }
}
