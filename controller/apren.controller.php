<?php

include_once "model/apren.php";

class AprenController
{
    private $object;

    public function __construct()
    {
        $this->object = new apren();
    }

    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/aprendiz/aprendiz.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/aprendiz/aprendiz.php";
        require_once "view/boostrap/footer.php";
    }

    public function reviewTa(){

    }
}