<?php
include_once 'lib/database/database.php'; 
class Login{
    private $consulta; 
    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }
    public function validarUsuario($usuario)
    {
        $query = "(SELECT 'delegados' FROM userder WHERE user_del = '$usuario')";

        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPassword($pass){
        $query = "(SELECT 'delegados' FROM userder WHERE pasw_del = '$pass')";

        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }


}


?>