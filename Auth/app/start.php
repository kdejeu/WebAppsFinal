<?php

use Slim\SLim;
use Slim\Views\Twig;
use Slim\Views\Twig\Extension;
use Noodlehaus\Config;

use DejeuCrew\User\User;

session_cache_limiter(false);
session_start();

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
    'mode' => file_get_contents(INC_ROOT . '/mode.php'),
    'view' => new Twig(),
    'templates.path' => INC_ROOT . 'app/views'
]);

//change mode from production to development
$app->configureMode($app->config('mode'), function() use ($app){
    $app->config = Config::load(INC_ROOT . '/app/config/{$app->mode}.php');
});

require 'database.php';

$app->container->set('user', function(){
    return new User;
});

$view = $app->view();

$view -> parserOptions = [
    'debug'=>$app->config->get('twig.debug')
];

$view ->parserExtensions = [
    new TwigExtension
];
