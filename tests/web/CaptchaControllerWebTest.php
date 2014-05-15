<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Silex\WebTestCase;

class CaptchaControllerWebTest extends WebTestCase
{
	public function createApplication() {
		include __DIR__ . '/../../web/index.php';
		return $app;
	}
	
	public function testRoot() {
		$client = $this->createClient();
		$crawler = $client->request('GET', '/');
		$this->assertEquals(true, $client->getResponse()->isOk());
	}

	public function testCaptcha() {
		$client = $this->createClient();
		$crawler = $client->request('GET', '/api/v1/captcha');
		$this->assertEquals(true, $client->getResponse()->isOk());

		$content = $client->getResponse()->getContent();
		$this->assertEquals(true, preg_match('/(\w+)\s([\+\-\*])\s(\w+)\s=\s(-?\d+)/', $content));
	}
}
