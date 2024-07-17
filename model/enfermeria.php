<?php
class Enfermeria{

    private $consulta;

    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }

    public function selectUser($username) {
        $sql = "SELECT * FROM delegados WHERE user_del = ?";
        $stmt = $this->consulta->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }


    public function updateUser($user, $pasw, $name, $nameApe, $tel, $email) {
        $sql = "UPDATE delegados SET pasw_del = ?, name_del = ?, apelli_del = ?, tel_del = ?, email_inst_del = ? WHERE user_del = ?";
        $stmt = $this->consulta->prepare($sql);
        $stmt->bind_param("ssssss", $pasw, $name, $nameApe, $tel, $email, $user);
        if (!$stmt->execute()) {
            throw new Exception('Error ejecutando la consulta: ' . $stmt->error);
        }
    }
    


}