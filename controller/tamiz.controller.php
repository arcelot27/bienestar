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
        $style = "<link rel='stylesheet' href='#'>";
        require_once "view/tamiz/tamices.php";
    }

    public function reviewTa(){

    }
}