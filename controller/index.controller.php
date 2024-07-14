<?php

include_once "model/Index.php";

class IndexController
{
    private $object;

    public function __construct()
    {
        $this->object = new Index();
    }

    public function Inicio()
    {

        $style = "<link rel='stylesheet' href='assets\css\index\index.css'>
                <link rel='stylesheet' href='assets/css/static/header_prin.css'>
                <link rel='stylesheet' href='assets/css/static/footer.css'>";
        require_once "view/head.php";
        require_once "view/heder_prin.php";
        require_once "view/index-view/index.php";
        require_once "view/footer.php";
    }
}
