<?php
require_once "Controller/IndexController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . 
dirname($_SERVER['PHP_SELF']));


// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

$indexController = new IndexController();


// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home': 
        $indexController->showHome(); 
        break;
    case 'login': 
        $loginController->showLogin(); 
        break;
    case 'signup': 
        $loginController->showSignup(); 
        break;
    default: 
        echo('404 Page not found'); 
        break;
}