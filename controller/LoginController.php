<?php
require_once "./model/LoginModel.php";
require_once "./view/LoginView.php";


class LoginController{
    private $model;
    private $view;

    function __construct(){
        //$this->model = new LoginModel();
        //$this->view = new LoginView();
    }

    function showLogin(){
        //$tasks = $this->model->getTasks();
        $this->view->showIndex();
    }

    function showSignup(){
        //$tasks = $this->model->getTasks();
        $this->view->showIndex();
      
    }
    

}