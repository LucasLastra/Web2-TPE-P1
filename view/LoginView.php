<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class LoginView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showLogin($mensaje = ''){
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('pagina', 'login');  
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/login.tpl');
    }

    function showSignup($mensaje = ''){
        $this->smarty->assign('titulo', 'Registrarse'); 
        $this->smarty->assign('pagina', 'signup');       
        $this->smarty->assign('mensaje', $mensaje); 
        $this->smarty->display('templates/login.tpl');
    }
    
    function showHomeLocation($location){
        header("Location: ".BASE_URL.$location);
   }

   function showHome(){
    header("Location: ".BASE_URL."home");
    }

    function logged($usuario){
        $this->smarty->assign('logged', 'logged');
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('templates/index.tpl');
    }

}