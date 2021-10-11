<?php

require_once "./view/IndexView.php";
require_once "./Helpers/AuthHelper.php";

class IndexController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        //$this->model = new IndexModel();
        $this->view = new IndexView();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        $this->authHelper->checkLoggedIn();
        $name = $this->authHelper->getUserName();
        $this->view->showIndex($name);
    }
    
}