<?php
require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application(); 

$app->get('/', function() use($app) {
	return 'welcome';
});

$app->get('/api/v1/captcha', 'CaptchaController::captcha');

$app->run(); 
