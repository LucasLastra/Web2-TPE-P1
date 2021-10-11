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
        $islogged = $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $isAdmin = $this->authHelper->isAdmin();
        $canciones = $this->model->getCanciones();
        $this->view->showCanciones($name, $canciones, $islogged, $isAdmin);
    }

    function showGeneros(){
        $islogged = $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $isAdmin = $this->authHelper->isAdmin();
        $generos = $this->model->getGeneros();
        $this->view->showGeneros($name, $generos, $islogged, $isAdmin);
    }

    function infoCancion($id){
        $islogged = $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $isAdmin = $this->authHelper->isAdmin();
        $cancion = $this->model->getCancion($id);
        $this->view->showCancion($name, $cancion, $islogged, $isAdmin);
    }

    function infoGenero($id){
        $islogged = $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $isAdmin = $this->authHelper->isAdmin();
        $genero = $this->model->getGenero($id);
        $this->view->showGenero($name, $genero, $islogged, $isAdmin);
    }
}