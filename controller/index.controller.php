<?php

include_once "model/Index.php"; 

class IndexController{
    private $object; 

    public function __construct(){
        $this -> object = new Index(); 
    }

    public function Inicio(){
        require_once "view/index-view/index.php"; 
    }   
    
}

?>