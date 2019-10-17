<?php

// Import des class

use App\Router;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Nyholm\Psr7Server\ServerRequestCreator;
use Slim\Views\PhpRenderer;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

// Autoload de Composer
require 'vendor/autoload.php';

// Création de la request
$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory,
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

$request = $creator->fromGlobals();

// Création du renderer
$renderer = new PhpRenderer("./src/templates");

// Tout ce qui concerne le Router
$router = new Router($renderer);
$action = $router->match($request->getUri()->getPath());

// Création de la réponse
$response = $action
    ? $action->action($request)
    : $renderer->render(new Response(404), "404.php");

// Envoie de la réponse
(new SapiEmitter())->emit($response);
