<?php
require_once "Controller/IndexController.php";
require_once "Controller/LoginController.php";
require_once "Controller/TablasController.php";
require_once "Controller/AdminController.php";

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
$loginController = new LoginController();
$tablasController = new TablasController();
$adminController = new AdminController();

// determina que camino seguir según la acción
switch ($params[0]) {
    //ABM
    case 'abm': 
        $adminController->showAbm(); 
        break;

    //INDEX
    case 'home': 
        $indexController->showHome(); 
        break;

    //CANCIONES, GENEROS
    case 'canciones': 
        $tablasController->showCanciones(); 
        break;
    case 'generos': 
        $tablasController->showGeneros(); 
        break;
    case 'infoCancion': 
        $tablasController->infoCancion($params[1]); 
        break;
    case 'infoGenero': 
        $tablasController->infoGenero($params[1]); 
        break;

    //LOGIN, LOGOUT, SIGNUP    
    case 'login': 
        $loginController->showLogin(); 
        break;
    case 'logout': 
        $loginController->logout(); 
        break;
    case 'signup': 
        $loginController->showSignup(); 
        break;
    case 'verifyLogin': 
        $loginController->verifyLogin(); 
        break;
    case 'verifySignup': 
        $loginController->verifySignup(); 
        break;
    //
    default: 
        echo('404 Page not found'); 
        break;
}