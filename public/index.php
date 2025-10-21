<?php

//Import de l'autoloader
include __DIR__ . "../../vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, "/../.env");
$dotenv->load();

//Import des classes
use App\Controller\HomeController;
use App\Controller\ErrorController;

//Créer des objets Controller
$homeController = new HomeController();
$errorController = new ErrorController();
//Router
switch ($path) {
    case '/':
        $homeController->index();
        break;
    case '/login':
        echo "login";
        break;
    case '/logout':
        echo "Déconnexion";
        break;
    case '/chocoblast/add':
        echo "Ajout d'un chocoblast";
        break;
    case '/chocoblast/all':
        echo "Afficher tous les chocoblasts";
        break;
    case '/chocoblast/id':
        echo "Affichage d'un chocoblast par son ID";
        break;
    case '/chocoblast/update/id':
        echo "Modifier le chocoblast par son ID";
        break;
    case '/chocoblast/delete/id':
        echo "Supprimer un chocoblast par son ID";
        break;
    default:
        $errorController->error404();
        break;
}
