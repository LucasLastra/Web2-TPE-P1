<?php

class LoginModel{

    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=web2_tpe_p1;charset=utf8', 'root', '');
    }

    function getUser($usuario){
        $query = $this->db->prepare('SELECT * FROM users WHERE nombre = ?');
        $query->execute([$usuario]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function setUser($usuario, $password){
        
        $query = $this->db->prepare('INSERT INTO users (nombre, contraseña) VALUES (?, ?)');
        $query->execute([$usuario, $password]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}