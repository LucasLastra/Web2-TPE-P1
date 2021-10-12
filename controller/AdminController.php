<?php
require_once "./model/AdminModel.php";
require_once "./view/Tablasview.php";
require_once "./Helpers/AuthHelper.php";

class AdminController {
    private $model;
    private $view;
    private $AuthHelper;


    function __construct() {
        $this-> model = new AdminModel();
        $this-> view = new Tablasview();
        $this-> authHelper = new AuthHelper ();
    }

    function addCanciones (){
        $this -> Authelper -> isAdmin ();

        $nombre = $_POST ['nombre'];
        $artista = $_POST ['artista'];
        $album = $_POST ['album'];
        $fecha = $_POST ['fecha'];
        $genero = $_POST ['genero'];
        
        if(!empty($nombre) || !empty ($artista) ||!empty($album)|| !empty ($fecha) || !empty($genero)){
            $this -> AdminModel -> addCancion ($nombre, $artista, $album, $fecha, $genero);
        } else{
            $this->TablasView-> showCanciones ();
        } 
            
    } 
    //ver como agregar el delete que esta en el model

    function addGenero($id) {
        $this->authHelper->isAdmin();
        if (is_null($id)) {
            $this->AdminModel->addCategoria ($_POST['genero'], $_POST['nombre']);
        } else {
            $this->AdminModel->actualizarGenero($id, $_POST['genero'], $_POST['nombre']);
        }
        $this->view-> showHomeLocation(); //Capaz hay que cambiar adonde va
    }
}
