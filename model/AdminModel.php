<?php

class AdminModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2_tpe_p1;charset=utf8', 'root', '');
    }

    function addCancion ($nombre, $artista, $album, $fecha, $genero){
        $sentence = $this->db->prepare("INSERT INTO canciones (nombre,artista,album,fecha,genero) VALUES(?,?,?,?,?)");
        $sentence -> execute (array ($nombre, $artista, $album, $fecha, $genero));
    }

    function deleteCancion ($id_cancion){
        $sentence = $this->db->prepare("DELETE FROM `canciones` WHERE `canciones`.`id_cancion` = ?");
        $sentence->execute(array($id_cancion));
    }

}


