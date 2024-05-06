<?php

include_once "model/login.php"; 

class LoginController{
    private $object; 
    public $loginModel;
    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Inicio(){
        $style =     "<link rel='stylesheet' href='assets/css/login/login.css'>"; 
        require_once "view/login/login.php";
        require_once "view/head.php";
    }

    public function validarUser()
    {
        $usuario = $_POST['user'];
        $passEncrypt = $_POST['pasword'];

        if (empty($usuario) || empty($passEncrypt)) {
            header('Location: ?b=login');
        } else {
            $usuario_valido = $this->loginModel->validarUsuario($usuario);
            $password_valido = $this->loginModel->validarPassword($passEncrypt);
            if ($usuario_valido) {
                if ($password_valido) {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['roll_del'] = $usuario_valido->roll_del;
                    // header("Location: ?b=profile&s=Inicio"); 
                    var_dump($_SESSION);

                    exit();
                } else {
                    echo ("Usuario y/o contraseña incorrectos, por favor verifique");
                }
            } else {
                echo ("Usuario y/o contraseña incorrectos, por favor verifique");
            }
        }
    }
}