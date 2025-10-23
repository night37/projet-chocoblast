<?php

//Import de l'autoloader
include __DIR__ . "../../vendor/autoload.php";

//Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

/** Import des classes */

use App\Controller\HomeController;
use App\Controller\ErrorController;
use App\Controller\SecurityController;
use App\Service\SecurityService;

$errorController = new ErrorController();

/** Bloc Router */

use Mithridatem\Routing\Route;
use Mithridatem\Routing\Router;
use Mithridatem\Routing\Exception\RouterException;

//instance du router
$router = new Router();

/** Ajouter les routes */
$router->map(Route::controller('GET', '/', HomeController::class, 'index'));
$router->map(Route::controller('GET', '/error', ErrorController::class, 'error403'));
$router->map(Route::controller('GET', '/login', SecurityService::class, 'login'));
$router->map(Route::controller('POST', '/login', SecurityService::class, 'login'));
$router->map(Route::controller('GET', '/logout', SecurityService::class, 'logout'));
$router->map(Route::controller('GET', '/register', SecurityService::class, 'register'));
$router->map(Route::controller('POST', '/register', SecurityService::class, 'register'));

try {
    $router->dispatch();
} catch (RouterException $e) {
    $errorController->error404();
}
