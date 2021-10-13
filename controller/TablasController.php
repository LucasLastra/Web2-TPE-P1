<?php
require_once "./model/TablasModel.php";
require_once "./view/TablasView.php";
require_once "./Helpers/AuthHelper.php";

class TablasController{
    private $model;
    private $view;
    private $authHelper;
    private $name;
    private $datos;
    private $islogged;
    private $isAdmin;

    function __construct(){
        $this->model = new TablasModel();
        $this->view = new TablasView();
        $this->authHelper = new AuthHelper();
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
            case 
                'cancion': $this->datos = $this->model->getCancion($id); 
                break;
            case 
                'genero': $this->datos = $this->model->getGenero($id);
                break;
        }
    }

    function showCanciones(){
        $this->getData('canciones');
        $this->view->showCanciones($this->name, $this->datos, $this->islogged, $this->isAdmin);
    }

    function showGeneros(){
        $this->getData('generos');
        $this->view->showGeneros($this->name, $this->datos, $this->islogged, $this->isAdmin);
    }

    function infoCancion($id){
        $this->getData('cancion', $id);
        $this->view->showCancion($this->name, $this->datos, $this->islogged, $this->isAdmin);
    }

    function infoGenero($id){
        $this->getData('genero', $id);
        $this->view->showGenero($this->name, $this->datos, $this->islogged, $this->isAdmin);
    }
}