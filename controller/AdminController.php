<?php
require_once "./model/AdminModel.php";
require_once "./view/Tablasview.php";
require_once "./Helpers/AuthHelper.php";

class AdminController {
    private $model;
    private $view;
    private $authHelper;
    private $name;
    private $datos;
    private $islogged;
    private $isAdmin;

    function __construct() {
        $this-> model = new AdminModel();
        $this-> view = new Tablasview();
        $this-> authHelper = new AuthHelper ();
    }

    //función privada que trae todos los datos necesarios para mostrar las páginas por cada acción
    private function getData($datos, $id=''){
        $this->islogged = $this->authHelper->checkLoggedIn();
        $this->name = $this->authHelper->getUserName();
        $this->isAdmin = $this->authHelper->isAdmin();

        switch($datos){
            case 
                'canciones': $this->datos = $this->model->getCanciones(); 
                break;
            case 
                'generos': $this->datos = $this->model->getGeneros();
                break;
        }
    }

    function deleteCancion($id){
        $this->model->deleteCancion($id);
        $this->view->showABMCancionesLocation();
    }

    function deleteGenero($id){
        $cancionesConGenero = $this->model->getCancionesConGenero($id);
        if(isset($cancionesConGenero[0])){
            $this->showAbmGeneros('No se puede eliminar un género que tiene canciones!');
        }else{
            $this->model->deleteGenero($id);
            $this->view->showABMGenerosLocation();
        }  
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
        $this->view->showABMCancionesLocation();
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
        $this->view->showABMCancionesLocation();

    }

    function updateGenero($id){
        if(isset($_POST['genero'])){
            
            $generoDTB = $this->model->getGenero($_POST['genero']);
            if($generoDTB->nombre_genero == $_POST['genero']){
                $this->showAbmGeneros('ya hay un genero con ese nombre!');
            }else{
                $this->model->editGenero($_POST['genero'], intval($id));
            }
        } 
        $this->view->showABMGenerosLocation();
    }

    function addGenero(){       
        if(isset($_POST['genero'])){
            
            $generoDTB = $this->model->getGenero($_POST['genero']);
            if($generoDTB->nombre_genero == $_POST['genero']){
                $this->showAbmGeneros('ya hay un genero con ese nombre!');
            }else{
                $this->model->addGenero($_POST['genero']);
                $this->view->showABMGenerosLocation();
            }
        } 
    }


    function showAbmCanciones(){
        $this->getData('canciones');
        $this->view->showAbmCanciones($this->name, $this->datos, $this->islogged, $this->isAdmin);
    }

    function showAbmGeneros($msj = ''){
        $this->getData('generos');
        $this->view->showAbmGeneros($this->name, $this->datos, $this->islogged, $this->isAdmin, $msj);
    }
}
