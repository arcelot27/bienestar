<?php
include_once "model/login.php"; 

class LoginController{
    public $loginModel;

    public function __construct(){
        $this->loginModel = new Login();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/login/login.css'>
                <link rel='stylesheet' href='assets/css/static/footer.css'>"; 
        require_once "view/login/login.php";
        require_once "view/head.php";
        require_once "view/footer.php";
    }

    public function validarUser(){

        if (isset($_POST['user']) && isset($_POST['pasword'])) {
            $usuario = $_POST['user'];
            $passEncrypt = $_POST['pasword'];

            if (empty($usuario) || empty($passEncrypt)) {
                $mensaje = "Por favor ingrese valores en los espacios correspondientes";
                echo "<script>window.location.href = '?b=login&mensaje=" . urlencode($mensaje) . "';</script>";
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
                                    header("Location: ?b=Enfermeria");
                                    break;
                                case 8:
                                    header("Location: ?b=Admin");
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
                            $mensaje = "Consultar con Soporte usuario sin roll";
                            echo "<script>window.location.href = '?b=login&mensaje=" . urlencode($mensaje) . "';</script>";
                        }
                    } else {
                        $mensaje = "Contraseña incorrecta";
                        echo "<script>window.location.href = '?b=login&mensaje=" . urlencode($mensaje) . "';</script>";
                    }
                } else {
                    $mensaje = "Usuario y/o contraseña incorrectos, por favor verifique";
                    echo "<script>window.location.href = '?b=login&mensaje=" . urlencode($mensaje) . "';</script>";
                    
                }
            }
        } else {
            header('Location: ?b=login');
            exit();
        }
    }
}
?>
