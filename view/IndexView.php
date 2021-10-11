<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class IndexView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showIndex($name, $islogged, $isAdmin){
        $this->smarty->assign('titulo', 'Inicio');  
        $this->smarty->assign('pagina', 'home');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('logueado', $islogged);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->display('templates/index.tpl');
    } 
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
   }



}