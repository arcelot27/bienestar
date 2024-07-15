<?php
include_once 'lib/database/database.php';

// Iniciar sesión
session_start();




$controller = "index";

if (!isset($_REQUEST['b'])) {
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'controller';
    $controller = new $controller; 
    $controller->Inicio();  
} else {
    $action = isset($_REQUEST['s']) ? $_REQUEST['s'] : 'Inicio'; 
    $params = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
    $params = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';

    if (!file_exists($controller)) {
        $controller = strtolower($_REQUEST['b']);
        require_once "controller/$controller.controller.php";
        $controller = ucwords($_REQUEST['b']) . 'controller';
        $controller = new $controller();
        call_user_func(array($controller, $action), $params);
    } else {
        echo "Error 404: Página no encontrada";
    }

}
?>
