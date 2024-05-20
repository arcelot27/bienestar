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
        
        $_SESSION['name'] = $user['name_del'];

        
        $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
        <link rel='stylesheet' href='assets/css/user/enfermeria/enfermeria.css'>";
        require_once "view/head.php";
        require_once "view/heder_user.php";
        require_once "view/user/enfermeria/enfermeria.php";
        require_once "view/footer.php";
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


