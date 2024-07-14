<?php
include_once 'lib/database/database.php';

// Iniciar sesión
session_start();

// Función para verificar si el usuario está autenticado
function verificarSesion() {
    if (!isset($_SESSION['usuario_validado']) || $_SESSION['usuario_validado'] !== true) {
        header('Location: ?b=index'); // Redirige a la página de inicio de sesión
        exit();
    }
}


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
