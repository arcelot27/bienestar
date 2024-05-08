<?php

include_once "model/admin.php"; 

class AdminController{
    private $object;
    
    public function __construct()
    {
        $this->object = new Admin();
    }

    public function Inicio(){
        $usuario = $_SESSION['usuario'];
        $user = $this->object->selectUser($usuario);
        
        $_SESSION['name'] = $user['name_del']; 

        require_once "view/user/admin/admin.php";
    }

    public function sessionexit() {

        if (isset($_GET['s']) && $_GET['s'] === 'sessionexit') {
            
            echo '<script>alert("Sesión cerrada exitosamente");</script>';

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
}
?>
