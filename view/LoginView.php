<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    //funcion de ayuda para no repetir codigo
    private function smartyAssign($islogged, $isAdmin, $titulo, $pagina){
        $this->smarty->assign('titulo', $titulo);  
        $this->smarty->assign('pagina', $pagina);
        $this->smarty->assign('logueado', $islogged);
        $this->smarty->assign('isAdmin', $isAdmin);
    }

    function showLogin($mensaje = ''){
        $this->smartyAssign(false, false, 'Iniciar Sesión', 'login');
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/login.tpl');
    }

    function showSignup($mensaje = ''){
        $this->smartyAssign(false, false, 'Registrarse', 'signup');
        $this->smarty->assign('mensaje', $mensaje); 
        $this->smarty->display('templates/login.tpl');
    }

    function showIndex($name, $islogged, $isAdmin){
        $this->smarty->assign('titulo', 'Inicio');  
        $this->smarty->assign('pagina', 'home');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('logueado', $islogged);
        $this->smarty->assign('isAdmin', $isAdmin);
        $this->smarty->display('templates/index.tpl');
    } 
    
    function showHomeLocation($location){
        header("Location: ".BASE_URL.$location);
   }

   function showHome(){
    header("Location: ".BASE_URL."home");
    }

}