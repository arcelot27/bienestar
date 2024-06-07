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
        require_once "view/delegates/delegates-salud.php";
    }
    public function depo()
    {
        $roll_del = 1;
        $users = $this->object->getUsersByRole($roll_del);
        require_once "view/delegates/delegates-depo.php";
    }
    public function psicol()
    {
        $roll_del = 2;
        $users = $this->object->getUsersByRole($roll_del);
        require_once "view/delegates/delegates-psico.php";
    }

    public function add()
    {
        require_once "view/delegates/delegates-agre.php";
    }

    public function guardarDelegado() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['name'], $_POST['nombres'], $_POST['apellidos'], $_POST['telefono'], $_POST['tipoDocumento'], $_POST['numeroDocumento'], $_POST['email'], $_POST['rol'])) {
                $user_del = trim($_POST['name']);
                $name_del = trim($_POST['nombres']);
                $apelli_del = trim($_POST['apellidos']);
                $tel_del = trim($_POST['telefono']);
                $tipo_documen_del = trim($_POST['tipoDocumento']);
                $dni_del = trim($_POST['numeroDocumento']);
                $email_del = trim($_POST['email']);
                $email_inst_del = isset($_POST['emailInstitucional']) ? trim($_POST['emailInstitucional']) : null; // Si no se proporciona, se establece como null
                $roll_del = (int)$_POST['rol']; // Convertir a entero

                $errors = [];

                // Validar nombre del usuario
                if (empty($user_del)) {
                    $errors[] = "El nombre del usuario es obligatorio.";
                }

                // Validar apellidos
                if (empty($apelli_del)) {
                    $errors[] = "Los apellidos son obligatorios.";
                }

                // Validar teléfono
                if (empty($tel_del)) {
                    $errors[] = "El teléfono es obligatorio.";
                } elseif (!preg_match('/^\d{10}$/', $tel_del)) {
                    $errors[] = "El teléfono debe tener exactamente 10 dígitos.";
                }

                // Validar tipo de documento
                if (empty($tipo_documen_del)) {
                    $errors[] = "El tipo de documento es obligatorio.";
                }

                // Validar número de documento
                if (empty($dni_del)) {
                    $errors[] = "El número de documento es obligatorio.";
                }

                // Validar email
                if (empty($email_del)) {
                    $errors[] = "El email es obligatorio.";
                } elseif (!filter_var($email_del, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "El email no es válido.";
                }

                // Validar email institucional (opcional)
                if (!empty($email_inst_del) && !filter_var($email_inst_del, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "El email institucional no es válido.";
                }

                // Validar rol
                if (empty($roll_del)) {
                    $errors[] = "El rol es obligatorio.";
                }

                if (!empty($errors)) {
                    // Guardar los errores en la sesión
                    $_SESSION['errors'] = $errors;

                    // Redirigir de vuelta al formulario
                    header("Location: ?b=Admin&s=add");
                    exit();
                }

                if ($this->object->userExists($user_del)) {
                    // El usuario ya existe, mostrar un mensaje de error y redirigir de vuelta al formulario
                    $_SESSION['errors'] = ["El usuario ya existe en la base de datos."];
                    header("Location: ?b=Admin&s=add");
                    exit();
                } else {
                    // El usuario no existe, proceder con la inserción en la base de datos
                    if ($this->object->insertarDelegado($user_del, $roll_del, $name_del, $apelli_del, $tipo_documen_del, $dni_del, $tel_del, $email_del, $email_inst_del)) {
                        // Redirigir a alguna página de éxito o mostrar un mensaje de éxito aquí
                        header("Location: ?b=Admin&s=delegatesÑ");
                        exit();
                    }
                }
            } else {
                // El campo 'name' no está presente en la solicitud POST, manejar el error
                $_SESSION['errors'] = ["El campo 'name' no está presente en la solicitud."];
                header("Location: ?b=Admin&s=add");
                exit();
            }
        } else {
            // Manejar el error si no se proporcionan todos los campos necesarios
            echo "No se proporcionaron todos los campos necesarios.";
        }
    }
 
    // Controlador (AdminController.php)
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
