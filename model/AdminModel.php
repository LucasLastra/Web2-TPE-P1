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
    function addCategoria ($genero, $nombre_genero)
    {
       $sentence = $this->db->prepare("INSERT INTO genero (description , nombre_genero) VALUES (?,?)");
        $sentence->execute(array($genero, $nombre_genero)
        );
    }

    function actualizarCancion($id, $nombre, $artista, $album, $fecha, $genero) {
        $sentence = $this->db->prepare("UPDATE cancion  SET 
                                            nombre = ?, 
                                            artista = ?,
                                            album = ?, 
                                            fecha = ?,
                                            genero = ?,   
                                        WHERE id = ? ");
        $sentence->execute(array($nombre, $artista, $album, $fecha,$genero, $id));
    }

    function actualizarGenero ($id, $genero, $nombre){
        $sentence = $this->db->prepare("UPDATE genero  SET 
                                            nombre = ?,   
                                        WHERE id = ? ");
        $sentence->execute(array ($genero, $nombre, $id));
    }
}


