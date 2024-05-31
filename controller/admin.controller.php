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

        
        $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
                <link rel='stylesheet' href='assets/css/user/admin/admin.css'>";
        require_once "view/head.php";
        require_once "view/heder_user.php";
        require_once "view/user/admin/admin.php";
        require_once "view/footer.php";
        
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
    public function delegates(){
        $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
        <link rel='stylesheet' href='assets/css/del/delegates.css'>";
        require_once "view/head.php";
        require_once "view/heder_user.php";
        require_once "view/delegates/delegates.php";
        require_once "view/footer.php";
    }
    public function salud(){
        $roll_del = 4;
        $users = $this->object->getUsersByRole($roll_del);
        require_once "view/delegates/delegates-salud.php";
    }
    public function depo(){
        $roll_del = 1;
        $users = $this->object->getUsersByRole($roll_del);
        require_once "view/delegates/delegates-depo.php";
    }
    public function psicol(){
        $roll_del = 2;
        $users = $this->object->getUsersByRole($roll_del);
        require_once "view/delegates/delegates-psico.php";
    }
}
?>
