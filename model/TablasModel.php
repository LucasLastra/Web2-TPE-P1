<?php

class TablasModel{
     private $db;

     function __construct(){
          $this->db = new PDO('mysql:host=localhost;' . 'dbname=web2_tpe_p1;charset=utf8', 'root', '');
     }

     function getCanciones(){
          $query = $this->db->prepare('SELECT * FROM canciones AS c INNER JOIN genero AS g ON c.fk_genero = g.id_genero');
          $query->execute();
          return $query->fetchAll(PDO::FETCH_OBJ);
     }

     function getGeneros(){
          $query = $this->db->prepare('SELECT * FROM genero');
          $query->execute();
          return $query->fetchAll(PDO::FETCH_OBJ);
     }

     function getCancion($id){
          $query = $this->db->prepare( "SELECT * FROM canciones AS c INNER JOIN genero AS g 
          ON c.fk_genero = g.id_genero WHERE id_cancion=?");

          $query->execute(array($id));
          return $query->fetch(PDO::FETCH_OBJ);
     }

     function getGenero($id){
          $query = $this->db->prepare( "SELECT * FROM canciones AS c INNER JOIN genero AS g 
          ON c.fk_genero = g.id_genero WHERE c.fk_genero=?");

          $query->execute(array($id));
          return $query->fetchAll(PDO::FETCH_OBJ);
     }



}