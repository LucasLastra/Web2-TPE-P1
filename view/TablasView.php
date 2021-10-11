<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class TablasView {
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showCanciones($name, $canciones){
        $this->smarty->assign('titulo', 'Tabla de Canciones');  
        $this->smarty->assign('pagina', 'canciones');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('canciones', $canciones);
        $this->smarty->display('templates/tablaCanciones.tpl');
    } 

    function showGeneros($name, $generos){
        $this->smarty->assign('titulo', 'Tabla de Géneros');  
        $this->smarty->assign('pagina', 'generos');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/tablaGeneros.tpl');
    } 

    function showCancion($name, $cancion){
        $this->smarty->assign('titulo', $cancion->nombre);  
        $this->smarty->assign('pagina', 'cancion');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('cancion', $cancion);
        $this->smarty->display('templates/infoCancion.tpl');
    }

    function showGenero($name, $genero){
        $this->smarty->assign('titulo', $genero->nombre_genero);  
        $this->smarty->assign('pagina', 'genero');
        $this->smarty->assign('userName', $name);
        $this->smarty->assign('genero', $genero);
        $this->smarty->display('templates/infoGenero.tpl');
    }
    
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
   }



}