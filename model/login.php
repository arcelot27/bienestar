<?php
include_once 'lib/database/database.php'; 

class Login {
    private $consulta; 

    public function __construct() {
        try {
            $this->consulta = databaseConexion::conexion();
        } catch (Exception $e) {
            echo "Error de Conexion " . $e->getMessage(); 
        }
    }

    public function validarCredenciales($usuario, $password) {
        if (empty($usuario) || empty($password)) {
            return false;
        }

        $query = "SELECT user_del, pasw_del FROM delegados WHERE user_del = ?";
        $stmt = $this->consulta->prepare($query);
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['pasw_del']) {  // Suponiendo que las contraseñas no están encriptadas.
                return true;
            }
        }
        return false;
    }

    public function rollConseguir($usuario) {
        $query = "SELECT roll_del FROM delegados WHERE user_del = ?";
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
