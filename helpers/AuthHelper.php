<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("Location: ".BASE_URL."login");
        }
    }

    function getUserName(){
        if(isset($_SESSION["usuario"])){
            return $_SESSION["usuario"];
        }
    }

}