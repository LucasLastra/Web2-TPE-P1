<?php

class CommentsModel
{
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=web2_tpe_p1;charset=utf8', 'root', '');
    }
//SELECT * FROM canciones AS c INNER JOIN genero AS g ON c.fk_genero = g.id_genero
    function getComments(){
        $query = $this->db->prepare("SELECT * FROM comentarios");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCommentsByNews($id_news){
        $query = $this->db->prepare("SELECT comentarios.* FROM comentarios INNER JOIN noticias ON comentarios.id_noticia = noticias.id_Noticia WHERE comentarios.id_noticia = ?");
        $query->execute(["$id_news"]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCommentsCancion($idCancion){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE fk_cancion = ?");
        $query->execute([$idCancion]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getComment($id){
        $query = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentarios = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function postComment($comentario, $puntuacion, $id){
        $query = $this->db->prepare("INSERT INTO comentarios(comentario, puntuacion, fk_cancion) VALUES(?,?,?)");
        $query->execute([$comentario, $puntuacion, $id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function deleteComment($id){
        $query = $this->db->prepare("DELETE FROM comentarios WHERE id_comentarios=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    
}
