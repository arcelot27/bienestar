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
        $query = "(SELECT user_del FROM delegados WHERE user_del = '$usuario')";

        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPassword($password){
        $query = "(SELECT pasw_del FROM delegados WHERE pasw_del = '$password')";

        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function rollConseguir($usuario){
        $query = "(SELECT roll_del FROM delegados WHERE user_del = ?)";
        $stmt = $this->consulta->prepare($query);
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($rol);
            $stmt->fetch();
            return $rol;
        } else {
            return false;
        }
    }

}


?>