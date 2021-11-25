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
    //ABM usuarios
    case 'abmUsuarios': 
        $adminController->showAbmUsuarios(); 
        break;

    case 'deleteUsuario': 
        $adminController->deleteUsuario($params[1]); 
        break;

    case 'updateUsuario': 
        $adminController->updateUsuario($params[1]); 
        break;


    //ABM
    case 'abmCanciones': 
        $adminController->showAbmCanciones(); 
        break;

    case 'abmGeneros': 
        $adminController->showAbmGeneros(); 
        break;

    case 'addCancion': 
        $adminController->addCancion(); 
        break;

    case 'updateCancion': 
        $adminController->updateCancion($params[1]); 
        break;

    case 'deleteCancion': 
        $adminController->deleteCancion($params[1]); 
        break;

    case 'addGenero': 
        $adminController->addGenero(); 
        break;

    case 'updateGenero': 
        $adminController->updateGenero($params[1]); 
        break;

    case 'deleteGenero': 
        $adminController->deleteGenero($params[1]); 
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
        if(isset($params[1])){
            $tablasController->infoGenero($params[1]); 
        }else{
            $tablasController->infoGenero('Vacío');
        }
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