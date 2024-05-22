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
        $sql = "SELECT * FROM delegados WHERE user_del = '$username'";
        $result = $this->consulta->query($sql); 
        if (!$result) {
            die('Error executing query: ' . $this->consulta->error);
        }
        $user = $result->fetch_assoc(); 
        return $user;
    }


    public function updateUser($user, $name, $nameApe, $tel, $email) {
        $sql = "UPDATE delegados SET name_del = :name_del, apelli_del = :apelli_del, tel_del = :tel_del, email_del = :email_del WHERE user_del = :user_del";
        $stmt = $this->consulta->prepare($sql);
        $stmt->execute([
            ':user_del' => $user,
            ':name_del' => $name,
            ':apelli_del' => $nameApe,
            ':tel_del' => $tel,
            ':email_del' => $email,
        ]);
    }


}