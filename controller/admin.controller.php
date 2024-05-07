<?php

include_once "model/admin.php"; 

class AdminController{
    public $conexion;
    public function __construct(){
        $this->conexion = new Admin();
    }

    public function Admin(){
        require_once "view/user/admin/admin.php";
    }
}