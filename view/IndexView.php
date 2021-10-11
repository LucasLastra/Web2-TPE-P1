<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class IndexView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showIndex($name){
        $this->smarty->assign('titulo', 'Inicio');  
        $this->smarty->assign('pagina', 'home');
        $this->smarty->assign('userName', $name);
        $this->smarty->display('templates/index.tpl');
    } 
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
   }



}