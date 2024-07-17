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
    public function insertarDelegado($user_del, $pasw_del, $roll_del, $name_del, $apelli_del, $tipo_documen_del, $dni_del, $tel_del, $email_del, $email_inst_del) {
        $sql = "INSERT INTO delegados (user_del, pasw_del, roll_del, name_del, apelli_del, tipo_documen_del, dni_del, tel_del, email_del, email_inst_del) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->consulta->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->consulta->error);
        }
        // 'ssssssssss' indica que estás pasando 10 strings
        $stmt->bind_param('ssssssssss', $user_del, $pasw_del, $roll_del, $name_del, $apelli_del, $tipo_documen_del, $dni_del, $tel_del, $email_del, $email_inst_del);
        if (!$stmt->execute()) {
            die("Error en la ejecución de la consulta: " . $stmt->error);
        }
        $stmt->close();
    }
    

    public function userExists($username) {
        $sql = "SELECT COUNT(*) AS count FROM delegados WHERE user_del = ?";
        $stmt = $this->consulta->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['count'];
        $stmt->close();
        return $count > 0;
    }
    
    public function getUsersByRole($roll_del) {
        $query = "SELECT user_del, name_del, apelli_del, tel_del, email_del, email_inst_del FROM delegados WHERE roll_del = ?";
        $stmt = $this->consulta->prepare($query);
        $stmt->bind_param('i', $roll_del);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($user_del) {
        $stmt = $this->consulta->prepare("SELECT * FROM delegados WHERE user_del = ?");
        $stmt->bind_param("s", $user_del);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }


    public function updateUser($user, $name, $nameApe, $tel, $email, $emailInst) {
        $stmt = $this->consulta->prepare("UPDATE delegados SET name_del = ?, apelli_del = ?, tel_del = ?, email_del = ?, email_inst_del = ? WHERE user_del = ?");
        $stmt->bind_param("ssssss", $name, $nameApe, $tel, $email, $emailInst, $user);
        $stmt->execute();
        $stmt->close();
    }

    // Modelo (Admin.php)
    public function deleteUserById($userId) {
        $stmt = $this->consulta->prepare("DELETE FROM delegados WHERE user_del = ?");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
    }

}
?>
