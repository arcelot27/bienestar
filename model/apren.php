<?php

class Apren{

    private $consulta;

    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }

    public function reviewTa($servername, $username, $password, $dbname){
        // Crear la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $applicationDate = $_POST['applicationDate'];

            // Validar el nombre y la fecha en la base de datos
            $sql = "SELECT * FROM tu_tabla WHERE nombre = ? OR fecha_aplicacion = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $applicationDate);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<div class="alert alert-danger">El nombre o la fecha de aplicación ya existen en la base de datos.</div>';
            } else {
                echo '<div class="alert alert-success">El nombre y la fecha de aplicación son válidos.</div>';
            }

            $stmt->close();
        }

        $conn->close();
    }
    public function new($servername, $username, $password, $dbname){
        $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newTamizajeName = $_POST['newTamizajeName'];

    // Validar si el nombre del tamizaje ya existe en la base de datos
    $sql = "SELECT * FROM tamizajes WHERE nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $newTamizajeName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="alert alert-danger">El nombre del tamizaje ya existe en la base de datos.</div>';
    } else {
        // Insertar el nuevo tamizaje en la base de datos
        $sql = "INSERT INTO tamizajes (nombre) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $newTamizajeName);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success">El tamizaje ha sido creado exitosamente.</div>';
        } else {
            echo '<div class="alert alert-danger">Hubo un error al crear el tamizaje. Inténtalo de nuevo.</div>';
        }
    }

    $stmt->close();
}

$conn->close();
    }

}