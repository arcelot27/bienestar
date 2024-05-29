<?php
class Del{

    private $consulta;

    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }

    public function selectUser($username) {
        $sql = "SELECT * FROM delegados WHERE user_del = '$username'";
        $result = $this->consulta->query($sql); 
        if (!$result) {
            die('Error executing query: ' . $this->consulta->error);
        }
        $user = $result->fetch_assoc(); 
        return $user;
    }
}
?>
