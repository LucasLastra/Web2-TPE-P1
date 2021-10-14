<?php

require_once "./view/IndexView.php";
require_once "./Helpers/AuthHelper.php";

class IndexController{
    private $view;
    private $authHelper;

    function __construct(){
        $this->view = new IndexView();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){
        $islogged = $this->authHelper->checkLoggedIn();
        $isAdmin = $this->authHelper->isAdmin();
        $name = $this->authHelper->getUserName();
        $this->view->showIndex($name, $islogged, $isAdmin);
    }
}