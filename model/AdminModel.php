<?php

class AdminModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2_tpe_p1;charset=utf8', 'root', '');
    }

    function getCanciones(){
        $query = $this->db->prepare('SELECT * FROM canciones AS c INNER JOIN genero AS g ON c.fk_genero = g.id_genero');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
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


