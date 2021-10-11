<?php
require_once "./model/TablasModel.php";
require_once "./view/TablasView.php";
require_once "./Helpers/AuthHelper.php";

class TablasController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new TablasModel();
        $this->view = new TablasView();
        $this->authHelper = new AuthHelper();
    }

    function showCanciones(){
        $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $canciones = $this->model->getCanciones();
        $this->view->showCanciones($name, $canciones);
    }

    function showGeneros(){
        $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $generos = $this->model->getGeneros();
        $this->view->showGeneros($name, $generos);
    }

    function infoCancion($id){
        $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $cancion = $this->model->getCancion($id);
        $this->view->showCancion($name, $cancion);
    }

    function infoGenero($id){
        $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $genero = $this->model->getGenero($id);
        $this->view->showGenero($name, $genero);
    }


    
}