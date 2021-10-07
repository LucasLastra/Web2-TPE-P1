<?php
class IndexModel{

private $db;
function __construct(){
     $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tasks2021;charset=utf8', 'root', '');
}}