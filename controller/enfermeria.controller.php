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

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $response = ['success' => false, 'message' => ''];
    
            try {
                $user = $_POST['user_del'];
                $name = $_POST['name_del'];
                $nameApe = $_POST['apelli_del'];
                $tel = $_POST['tel_del'];
                $email = $_POST['email_del'];
    
                $this->object->updateUser($user, $name, $nameApe, $tel, $email);
                $response['success'] = true;
                $response['message'] = 'Datos actualizados correctamente';
            } catch (PDOException $e) {
                $response['message'] = 'Error al actualizar los datos: ' . $e->getMessage();
            }
    
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
    
}


