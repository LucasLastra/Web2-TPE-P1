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

    function deleteCancion($id){
        $this->model->deleteCancion($id);
        $this->view->showABMLocation();
    }

    function addCancion(){
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $album = $_POST['album'];
        $artista = $_POST['artista'];
        $genero = $_POST['genero'];
        
        $generoDTB = $this->model->getGenero($genero);

        //si el genero existe en la DBT entonces se agrega la canción con la id_genero
        if($generoDTB->nombre_genero == $genero){
            $this->model->addCancion($fecha, $nombre, $album, $artista, $generoDTB->id_genero);
        }else{
            //si no existe el genero, se crea, se busca y utiliza la nueva id
            $this->model->addGenero($genero);
            $generoDTB = $this->model->getGenero($genero);
            $this->model->addCancion($fecha, $nombre, $album, $artista, $generoDTB->id_genero);
        }  
        //se muestra la location del administrador
        $this->view->showABMLocation();
    }

    function updateCancion($id){
        switch($_POST){
            case 
                isset($_POST['fecha']): 
                $this->model->editCancion('fecha', $_POST['fecha'], intval($id));
            break;

            case 
                isset($_POST['nombre']):
                $this->model->editCancion('nombre', $_POST['nombre'], intval($id));
            break;

            case 
                isset($_POST['album']):
                $this->model->editCancion('album', $_POST['album'], intval($id));
            break;

            case 
                isset($_POST['artista']):
                $this->model->editCancion('artista', $_POST['artista'], intval($id));
            break;

            case 
            isset($_POST['genero']): $genero = $_POST['genero'];
            //si el genero existe en la DBT entonces se edita la canción con la id_genero
            $generoDTB = $this->model->getGenero($genero);
            if($generoDTB->nombre_genero == $genero){
                $this->model->editCancion('genero', $generoDTB->id_genero, intval($id));
            }else{
                //si no existe el genero, se crea, se busca y utiliza la nueva id
                $this->model->addGenero($genero);
                $generoDTB = $this->model->getGenero($genero);
                $this->model->editCancion('genero', $generoDTB->id_genero, intval($id));
            }
            break;
        }
        $this->view->showABMLocation();
    }

    function showAbm(){
        $this->getData();
        $this->view->showAbm($this->name, $this->canciones, $this->islogged, $this->isAdmin);
    }
}

