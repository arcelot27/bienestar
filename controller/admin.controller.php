<?php

include_once "model/admin.php";

class AdminController
{
    private $object;

    public function __construct()
    {
        $this->object = new Admin();
    }

    public function Inicio()
    {
        if (!isset($_SESSION['usuario'])) {
            $mensaje = "Debe iniciar sesión para acceder a esta página";
            header("Location: ?b=login&mensaje=" . urlencode($mensaje));
            exit();
        }
        $usuario = $_SESSION['usuario'];
        $user = $this->object->selectUser($usuario);

        $_SESSION['name'] = $user['name_del'];


        $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
                <link rel='stylesheet' href='assets/css/user/admin/admin.css'>";
        require_once "view/head.php";
        require_once "view/heder_user.php";
        require_once "view/user/admin/admin.php";
        require_once "view/footer.php";

        // Verificar la sesión antes de cargar cualquier controlador o acción
        verificarSesion();
    }

    public function sessionexit()
    {

        if (isset($_GET['s']) && $_GET['s'] === 'sessionexit') {

            echo '<script>alert("Sesión cerrada exitosamente");</script>';

            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            session_destroy();
            header("Location: ?b=index");
            exit();
        }
    }
    public function delegates()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/header_user.css'>
        <link rel='stylesheet' href='assets/css/del/delegates.css'>";
        require_once "view/head.php";
        require_once "view/heder_user.php";
        require_once "view/delegates/delegates.php";
        require_once "view/footer.php";
    }
    public function salud()
    {
        $roll_del = 4;
        $users = $this->object->getUsersByRole($roll_del);
        $style = "<link rel='stylesheet' href='assets/css/del/delegates-profile.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/delegates/delegates-salud.php";
        require_once "view/boostrap/footer.php";
    }
    public function depo()
    {
        $roll_del = 1;
        $users = $this->object->getUsersByRole($roll_del);
        $style = "<link rel='stylesheet' href='assets/css/del/delegates-profile.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/delegates/delegates-depo.php";
        require_once "view/boostrap/footer.php";
    }
    public function psicol()
    {
        $roll_del = 2;
        $users = $this->object->getUsersByRole($roll_del);
        $style = "<link rel='stylesheet' href='assets/css/del/delegates-profile.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/delegates/delegates-psico.php";
        require_once "view/boostrap/footer.php";
    }

    public function add()
    {
        $style = "<link rel='stylesheet' href='assets/css/del/delegates-add.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/delegates/delegates-agre.php";
        require_once "view/boostrap/footer.php";
    }

    public function guardarDelegado() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name'], $_POST['pasword'], $_POST['nombres'], $_POST['apellidos'], $_POST['telefono'], $_POST['tipoDocumento'], $_POST['numeroDocumento'], $_POST['email'], $_POST['rol'])) {
                $user_del = trim($_POST['name']);
                $pasw_del = trim($_POST['pasword']);
                $name_del = trim($_POST['nombres']);
                $apelli_del = trim($_POST['apellidos']);
                $tel_del = trim($_POST['telefono']);
                $tipo_documen_del = trim($_POST['tipoDocumento']);
                $dni_del = trim($_POST['numeroDocumento']);
                $email_del = trim($_POST['email']);
                $email_inst_del = isset($_POST['emailInstitucional']) ? trim($_POST['emailInstitucional']) : null;
                $roll_del = (int)$_POST['rol'];
    
                $errors = [];
    
                if (empty($user_del)) {
                    $errors[] = "El nombre del usuario es obligatorio.";
                }
    
                if (empty($pasw_del)) {
                    $errors[] = "La contraseña es obligatoria.";
                }
    
                if (empty($apelli_del)) {
                    $errors[] = "Los apellidos son obligatorios.";
                }
    
                if (empty($tel_del)) {
                    $errors[] = "El teléfono es obligatorio.";
                } elseif (!preg_match('/^\d{10}$/', $tel_del)) {
                    $errors[] = "El teléfono debe tener exactamente 10 dígitos.";
                }
    
                if (empty($tipo_documen_del)) {
                    $errors[] = "El tipo de documento es obligatorio.";
                }
    
                if (empty($dni_del)) {
                    $errors[] = "El número de documento es obligatorio.";
                }
    
                if (empty($email_del)) {
                    $errors[] = "El email es obligatorio.";
                } elseif (!filter_var($email_del, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "El email no es válido.";
                }
    
                if (!empty($email_inst_del) && !filter_var($email_inst_del, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "El email institucional no es válido.";
                }
    
                if (empty($roll_del)) {
                    $errors[] = "El rol es obligatorio.";
                }
    
                if (!empty($errors)) {
                    $_SESSION['errors'] = $errors;
                    header("Location: ?b=Admin&s=add");
                    exit();
                }
    
                if ($this->object->userExists($user_del)) {
                    $_SESSION['errors'] = ["El usuario ya existe en la base de datos."];
                    header("Location: ?b=Admin&s=add");
                    exit();
                } else {
                    if ($this->object->insertarDelegado($user_del, $pasw_del, $roll_del, $name_del, $apelli_del, $tipo_documen_del, $dni_del, $tel_del, $email_del, $email_inst_del)) {
                        header("Location: ?b=Admin&s=add");
                        exit();
                    }
                }
            } else {
                $_SESSION['errors'] = ["No se proporcionaron todos los campos necesarios."];
                header("Location: ?b=Admin&s=add");
                exit();
            }
        } else {
            echo "Método de solicitud no válido.";
        }
    }
    

    public function deleteUser()
    {
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

    public function tamiz()
    {
        require_once "view/tamiz/tami-bus.php";
    }
}
