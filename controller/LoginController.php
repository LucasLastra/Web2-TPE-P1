<?php
require_once "./model/LoginModel.php";
require_once "./view/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController{
    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new LoginModel();
        $this->view = new LoginView();
        $this->authHelper = new AuthHelper();
    }

    function showLogin(){
        $this->view->showLogin();
    }

    function showSignup(){
        //$tasks = $this->model->getTasks();
        $this->view->showSignup();
    }

    function verifyLogin(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($usuario);

            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->contraseña)) {

                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["isAdmin"] = $user->esAdmin;
                $this->view->showHome();
            } else {
                $this->view->showLogin("Acceso denegado");
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin("Te deslogueaste!");
    }

    function verifySignup(){
        $usuario = $_POST['usuario'];
        if(!$this->model->getUser($usuario) == $usuario){
            if($_POST['password'] != $_POST['password2']){
                $this->view->showSignup("Las contraseñas no coinciden!");
            }else{
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->model->setUser($usuario, $password);
                session_start();
                $user = $this->model->getUser($usuario);
                $_SESSION["usuario"] = $usuario;
                $_SESSION["isAdmin"] = $user->esAdmin;
                $this->view->showHome();
            }
        }else{
            $this->view->showSignup("Este usuario ya está en uso!");
        }
    }
}


