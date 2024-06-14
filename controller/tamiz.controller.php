<?php

include_once "model/tamiz.php";

class TamizController
{
    private $object;

    public function __construct()
    {
        $this->object = new Tamiz();
    }

    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tamices.css'>";
        
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/tamices.php";
        require_once "view/boostrap/footer.php";
    }
    public function enfe()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tamices.css'>";
        
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/tamices_enfe.php";
        require_once "view/boostrap/footer.php";
    }
    public function busenfe(){
        require_once "view/tamiz/tami-busenfe.php";
    }

}