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

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $response = ['success' => false, 'message' => ''];

            try {
                $user = $_POST['user_del'];
                $name = $_POST['name_del'];
                $nameApe = $_POST['apelli_del'];
                $tel = $_POST['tel_del'];
                $email = $_POST['email_del'];
                $emailInst = $_POST['email_inst_del'];

                $this->object->updateUser($user, $name, $nameApe, $tel, $email, $emailInst);
                $response['success'] = true;
                $response['message'] = 'Datos actualizados correctamente';
            } catch (PDOException $e) {
                $response['message'] = 'Error al actualizar los datos: ' . $e->getMessage();
            }

            echo json_encode($response);
            exit;
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $user_del = $_GET['id'];
            $user = $this->object->getUserById($user_del);

            if (!$user) {
                echo "Usuario no encontrado.";
                exit;
            }

            $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
                      ";
            require_once "view/head.php";
            require_once "view/heder_user.php";
            require_once "view/delegates/edit-delegates.php";
            require_once "view/footer.php";
        } else {
            echo "ID de usuario no proporcionado.";
            exit;
        }
    }

    // Controlador (AdminController.php)
public function deleteUser() {
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        try {
            $this->object->deleteUserById($userId);
            echo '<script>alert("Usuario eliminado correctamente."); window.location.href = "?b=admin&s=delegates";</script>';
        } catch (Exception $e) {
            echo '<script>alert("Error al eliminar el usuario: ' . $e->getMessage() . '"); window.location.href = "?b=admin&s=delegates";</script>';
        }
    }
}

}
?>
