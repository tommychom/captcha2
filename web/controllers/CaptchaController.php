<?php
class CaptchaController {

	private $captchaService;

	public function __construct() {
		$this->captchaService = new CaptchaService();
	}

	public function captcha() {
		return $this->captchaService->getCaptchaString();
	}

	public function setCaptchaService($captchaService) {
		$this->captchaService = $captchaService;
	}
}