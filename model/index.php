<?php


include_once 'lib/database/database.php'; 
class Index{
    private $consulta; 
    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }
}


?>