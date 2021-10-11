<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class TablasView {
    private $smarty;
    private $name;

    function __construct() {
        $this->smarty = new Smarty();
    }

    //funcion de ayuda para no repetir codigo
    private function smartyAssign($name, $islogged, $isAdmin, $titulo, $pagina){
        $this->smarty->assign('titulo', $titulo);  
        $this->smarty->assign('pagina', $pagina);
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('logueado', $islogged);
        $this->smarty->assign('isAdmin', $isAdmin);
    }

    function showCanciones($name, $canciones, $islogged, $isAdmin){
        $this->smartyAssign($name, $islogged, $isAdmin , 'Tabla de Canciones', 'canciones');
        $this->smarty->assign('canciones', $canciones);
        $this->smarty->display('templates/tablaCanciones.tpl');
    } 

    function showGeneros($name, $generos, $islogged, $isAdmin){
        $this->smartyAssign($name, $islogged, $isAdmin , 'Tabla de Géneros', 'generos');
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/tablaGeneros.tpl');
    } 

    function showCancion($name, $cancion, $islogged, $isAdmin){
        $this->smartyAssign($name, $islogged, $isAdmin , $cancion->nombre, 'cancion');
        $this->smarty->assign('cancion', $cancion);
        $this->smarty->display('templates/infoCancion.tpl');
    }

    function showGenero($name, $cancionesGenero, $islogged, $isAdmin){
        $this->smartyAssign($name, $islogged, $isAdmin , $cancionesGenero[0]->nombre_genero, 'genero');
        $this->smarty->assign('genero', $cancionesGenero);
        $this->smarty->display('templates/infoGenero.tpl');
    }
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
   }



}