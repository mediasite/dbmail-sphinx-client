<?php

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require_once(__DIR__ . '/../vendor/autoload.php');
$loader->add('app', realpath(__DIR__ . '/../'));

$params = require(__DIR__ . '/../app/config/params.php');

if (!empty($params['sentryDSN']) && !$params['debug']) {
    Raven_Autoloader::register();
    $client = new Raven_Client($params['sentryDSN']);
    $error_handler = new Raven_ErrorHandler($client);
    $error_handler->registerExceptionHandler();
    $error_handler->registerErrorHandler();
    $error_handler->registerShutdownFunction();
}

$app = new \Silex\Application(array(
    'debug' => $params['debug'],
    'params' => $params,
    'appDir' => realpath(__DIR__ . '/../app'),
));
require(__DIR__ . '/../app/bootstrap.php');
require(__DIR__ . '/../app/app.php');
$app->run();