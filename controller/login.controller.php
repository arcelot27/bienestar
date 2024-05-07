<?php
include_once "model/login.php"; 

class LoginController{
    public $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/login/login.css'>"; 
        require_once "view/login/login.php";
        require_once "view/head.php";
    }

    public function validarUser()
    {
        if (isset($_POST['user']) && isset($_POST['pasword'])) {
            $usuario = $_POST['user'];
            $passEncrypt = $_POST['pasword'];

            if (empty($usuario) || empty($passEncrypt)) {
                header('Location: ?b=login');
                exit();
            } else {
                $usuario_valido = $this->loginModel->validarUsuario($usuario);
                $password_valido = $this->loginModel->validarPassword($passEncrypt);

                if ($usuario_valido) {
                    if ($password_valido) {
                        $rol = $this->loginModel->rollConseguir($usuario);

                        if ($rol !== false) {
                            session_start();
                            $_SESSION['usuario'] = $usuario;
                            $_SESSION['roll_del'] = $rol;

                            switch ($rol) {
                                case 1:
                                    header("Location: ?b=dep");
                                    break;
                                case 2:
                                    header("Location: ?b=psico");
                                    break;
                                case 4:
                                    header("Location: ?b=enferme");
                                    break;
                                case 8:
                                    header("Location: ?b=admin");
                                    break;
                                case 16:
                                    header("Location: ?b=supadmin");
                                    break;
                                default:
                                    echo "Error: Rol no válido";
                                    break;
                            }
                            exit();
                        } else {
                            echo "Error: No se pudo obtener el rol del usuario";
                        }
                    } else {
                        echo "Contraseña incorrecta";
                    }
                } else {
                    echo "Usuario y/o contraseña incorrectos, por favor verifique";
                }
            }
        } else {
            header('Location: ?b=login');
            exit();
        }
    }
}
?>
