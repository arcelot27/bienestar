<?php
class Admin{

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

    public function getUsersByRole($roll_del) {
        $query = "SELECT user_del, name_del, apelli_del, tel_del, email_del, email_inst_del FROM delegados WHERE roll_del = ?";
        $stmt = $this->consulta->prepare($query);
        $stmt->bind_param('i', $roll_del);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
