<?php

include_once "model/enfermeria.php"; 

class EnfermeriaController{
    private $object;
    
    public function __construct()
    {
        $this->object = new Enfermeria();
    }

    public function Inicio(){
        $usuario = $_SESSION['usuario'];
        $user = $this->object->selectUser($usuario);


        require_once "view/user/enfermeria/enfermeria.php";
    }

    public function sessionexit(){
        $_SESSION = array();
                if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header("Location: ?b=index"); 
        exit();
    }
}


