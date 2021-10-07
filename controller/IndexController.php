<?php
require_once "./model/indexModel.php";
require_once "./view/indexView.php";


class IndexController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new IndexModel();
        $this->view = new IndexView();
    }

    function showHome(){
        //$tasks = $this->model->getTasks();
        $this->view->showIndex();
      
    }
    

}