<?php
include_once 'lib/database/database.php';


$controller = "index";

if(!isset($_REQUEST['b'])){
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'controller';
    $controller = new $controller; 
    $controller -> Inicio();  
} else{
    $controller = strtolower($_REQUEST['b']);
    $action = isset($_REQUEST['s']) ? $_REQUEST['s'] : 'Inicio'; 
    $params = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
    require_once "controller/$controller.controller.php";
    $controller = ucwords($_REQUEST['b']).'controller';
    $controller = new $controller(); 
    call_user_func(array($controller, $action),  $params, $value);
}

?>