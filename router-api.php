<?php

require_once 'libs/Router.php';
require_once 'Controller/ApiCommentsController.php';

// crea el router
$router = new Router();

$router->addRoute('comentarios/:ID', 'GET', 'ApiCommentsController', 'getCommentsCancion');
$router->addRoute('comentarios', 'POST', 'ApiCommentsController', 'postComment');
$router->addRoute('comentarios/','GET','ApiCommentsController','getComments');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentsController','deleteComment');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);