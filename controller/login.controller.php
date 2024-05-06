<?php

include_once "model/login.php"; 

class LoginController{
    private $object; 

    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Inicio(){
        $style =     "<link rel='stylesheet' href='assets/css/login/login.css'>"; 
        require_once "view/login/login.php";
        require_once "view/head.php";
    }
}