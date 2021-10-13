<?php
require_once "./model/AdminModel.php";
require_once "./view/Tablasview.php";
require_once "./Helpers/AuthHelper.php";

class AdminController {
    private $model;
    private $view;
    private $authHelper;
    private $name;
    private $canciones;
    private $islogged;
    private $isAdmin;

    function __construct() {
        $this-> model = new AdminModel();
        $this-> view = new Tablasview();
        $this-> authHelper = new AuthHelper ();
    }

    //función privada que trae todos los datos necesarios para mostrar las páginas por cada acción
    private function getData(){
        $this->islogged = $this->authHelper->checkLoggedIn();
        $this->name = $this->authHelper->getUserName();
        $this->isAdmin = $this->authHelper->isAdmin();
        $this->canciones = $this->model->getCanciones();
    }

    function addCanciones (){


        $nombre = $_POST ['nombre'];
        $artista = $_POST ['artista'];
        $album = $_POST ['album'];
        $fecha = $_POST ['fecha'];
        $genero = $_POST ['genero'];
        
        if(!empty($nombre) || !empty ($artista) ||!empty($album)|| !empty ($fecha) || !empty($genero)){
            $this -> AdminModel -> addCancion ($nombre, $artista, $album, $fecha, $genero);
        } else{

            $this->getData();
            $this->view-> showAbm($this->name, $this->canciones, $this->islogged, $this->isAdmin);
        } 
            
    } 
    //ver como agregar el delete que esta en el model

    function addGenero($id) {
        $this->authHelper->isAdmin();
        if (is_null($id)) {
            $this->AdminModel->addCategoria ($_POST['genero'], $_POST['nombre']);
        } else {
            $this->AdminModel->actualizarGenero($id, $_POST['genero'], $_POST['nombre']);
        }
        $this->view-> showHomeLocation(); //Capaz hay que cambiar adonde va
    }

    function showAbm(){
        $this->getData();
        $this->view->showCanciones($this->name, $this->canciones, $this->islogged, $this->isAdmin);

    }
}
