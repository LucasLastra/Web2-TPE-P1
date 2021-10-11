<?php

class AuthHelper{

    function __construct(){
    }

    function checkLoggedIn(){
        session_start();
        if(!isset($_SESSION["usuario"])){
          //  header("Location: ".BASE_URL."login");
          return false;

        }else{
            return true;
        }
    }

    function getUserName(){
        if(isset($_SESSION["usuario"])){
            return $_SESSION["usuario"];
        }
    }

    function isAdmin(){
        if(isset($_SESSION["isAdmin"])){
            return $_SESSION["isAdmin"];
        }
    }


}