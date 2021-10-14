<?php

class AdminModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2_tpe_p1;charset=utf8', 'root', '');
    }

    function getCanciones(){
        $sentence = $this->db->prepare('SELECT * FROM canciones AS c INNER JOIN genero AS g ON c.fk_genero = g.id_genero');
        $sentence->execute();
        return $sentence->fetchAll(PDO::FETCH_OBJ);
   }

    function addCancion ($fecha, $nombre, $album, $artista, $id){
        $sentence = $this->db->prepare("INSERT INTO canciones (fecha, nombre, album, artista, fk_genero) VALUES(?,?,?,?,?)");
        $sentence->execute(array($fecha, $nombre, $album, $artista, $id));
        return $sentence->fetch(PDO::FETCH_OBJ);
    }

    function editCancion($columna, $newData, $id){
        
        switch($columna){
            case 
                'fecha': $sentencia = $this->db->prepare("UPDATE canciones SET fecha=? WHERE id_cancion=?");
            break;

            case 
                'nombre': $sentencia = $this->db->prepare("UPDATE canciones SET nombre=? WHERE id_cancion=?");
            break;

            case 
                'album': $sentencia = $this->db->prepare("UPDATE canciones SET album=? WHERE id_cancion=?");
            break;

            case 
                'artista': $sentencia = $this->db->prepare("UPDATE canciones SET artista=? WHERE id_cancion=?");
            break;

            case 
                'genero': $sentencia = $this->db->prepare("UPDATE canciones SET fk_genero=? WHERE id_cancion=?");
            break;

        }
        $sentencia->execute(array($newData, $id));
    }

    function deleteCancion($id){
        $sentencia = $this->db->prepare("DELETE FROM canciones WHERE id_cancion=?");
        $sentencia->execute(array($id));
    }


    function getGenero($genero){
        $sentence = $this->db->prepare('SELECT * FROM genero WHERE nombre_genero=?');
        $sentence->execute([$genero]);
        return $sentence->fetch(PDO::FETCH_OBJ);
   }

   function addGenero($genero){
        $sentence = $this->db->prepare("INSERT INTO genero (nombre_genero) VALUES(?)");
        $sentence->execute([$genero]);
        return $sentence->fetch(PDO::FETCH_OBJ);
   }
}


