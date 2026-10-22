<?php

//debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$optionsModel = new \App\Models\OptionsModel();

$loader = new FilesystemLoader(__DIR__ . '/../src/Views');
$twig = new Environment($loader, [
    "cache" => false,
    "debug" => true
]);

$twig->addGlobal('site_name', $optionsModel->getSiteName());
$twig->addGlobal('domain', $optionsModel->getDomain());

$router = new Router();

$router->get('/', function() use ($twig) {
    $controller = new \App\Controllers\PageController($twig);
    $controller->index();
});

$router->get('/contact', function() use ($twig) {
    $controller = new \App\Controllers\ContactController($twig);
    $controller->contactPage();
});

$router->post('/contact', function() use ($twig) {
    $controller = new \App\Controllers\ContactController($twig);
    $controller->contactForm();
});

$router->get('/blog', function() use ($twig) {
    $controller = new \App\Controllers\BlogController($twig);
    $controller->blogs();
});

$router->get('/blog/{id}', function($id) use ($twig) {
    $controller = new \App\Controllers\BlogController($twig);
    $controller->blogPost($id);
});

$router->set404(function() use ($twig) {
    header('HTTP/1.1 404 Not Found');
    echo $twig->render('404.twig');
});

$router->run();