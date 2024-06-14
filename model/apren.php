<?php

class Apren
{
    private $consulta;

    public function __construct()
    {
        try {
            $this->consulta = databaseConexion::conexion();
        } catch (PDOException $e) {
            echo "Error de Conexion " . $e->getMessage();
        }
    }
    public function obtenerAprendices()
    {
        $sql = "SELECT 
                    jornada_apre, 
                    numero_ficha_apre, 
                    name_apre, 
                    ape_apre, 
                    tipo_docu_apre, 
                    dni_apre, 
                    edad_apre, 
                    sexo_apre, 
                    zona_resi_apre, 
                    lugar_resi_apre, 
                    numero_celular_apre, 
                    correo_apre, 
                    contac_emergen_apre, 
                    numero_contac_emergen_apre 
                FROM 
                    aprendiz";
        
        $result = $this->consulta->query($sql);
        
        $aprendices = array();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aprendices[] = $row;
            }
        }
        
        return $aprendices;
    }

    public function insertarAprendiz($datos_aprendiz)
    {
        // Preparar consulta SQL
        $sql = "INSERT INTO aprendiz (
                    name_apre, ape_apre, tipo_docu_apre, dni_apre, edad_apre, esta_civil_apre, sexo_apre, 
                    iden_gene_apre, grup_etn_apre, grup_etn_cual_apre, estr_apre, zona_resi_apre, lugar_resi_apre, 
                    servicios_publicos_apre, tiempo_libre_apre, vivie_apre, hijos_apre, embarazo_apre, 
                    control_prenatal_apre, diag_medico_apre, diag_medico_cual_apre, medica_apre, medica_cual_apre, 
                    limitaciones_apre, antecedentes_familiares_apre, antecedentes_familiares_otro_apre,numero_celular_apre, correo_apre, 
                    numero_ficha_apre, jornada_apre, contac_emergen_apre, numero_contac_emergen_apre
                ) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        // Preparar declaración
        $stmt = $this->consulta->prepare($sql);
    
        if ($stmt === false) {
            throw new Exception("Error al preparar la consulta: " . $this->consulta->error);
        }
    
        // Bind parameters
        $stmt->bind_param("ssssisssssisssssssssssssssssssss", 
            $datos_aprendiz['nombre'],
            $datos_aprendiz['apellidos'],
            $datos_aprendiz['tipo_documento'],
            $datos_aprendiz['dni'],
            $datos_aprendiz['edad'],
            $datos_aprendiz['estado_civil'],
            $datos_aprendiz['sexo'],
            $datos_aprendiz['identificacion_genero'],
            $datos_aprendiz['grupo_etnico'],
            $datos_aprendiz['grupo_etnico_cual'],
            $datos_aprendiz['estrato'],
            $datos_aprendiz['zona_residencia'],
            $datos_aprendiz['lugar_residencia'],
            $datos_aprendiz['servicios_publicos'],
            $datos_aprendiz['tiempo_libre'],
            $datos_aprendiz['vivienda'],
            $datos_aprendiz['hijos'],
            $datos_aprendiz['embarazo'],
            $datos_aprendiz['control_prenatal'],
            $datos_aprendiz['diagnostico_medico'],
            $datos_aprendiz['diagnostico_medico_cual'],
            $datos_aprendiz['medicacion'],
            $datos_aprendiz['medicacion_cual'],
            $datos_aprendiz['limitaciones'],
            $datos_aprendiz['antecedentes_familiares'],
            $datos_aprendiz['antecedentes_familiares_otro'],
            $datos_aprendiz['numero_celular'],
            $datos_aprendiz['correo'],
            $datos_aprendiz['numero_ficha'],
            $datos_aprendiz['jornada'],
            $datos_aprendiz['contacto_emergencia'],
            $datos_aprendiz['numero_contacto_emergencia']
        );
    
        // Ejecutar consulta
        $resultado = $stmt->execute();
    
        // Cerrar declaración
        $stmt->close();
    
        return $resultado;
    }
}
?>
