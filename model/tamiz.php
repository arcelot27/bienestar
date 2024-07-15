<?php

class Tamiz {

    private $conexion;

    public function __construct() {
        $this->conexion = databaseConexion::conexion();
    }

    public function buscarPorIdentificacion($identificacion) {
        $query = "SELECT id_apre, name_apre, ape_apre, tipo_docu_apre, dni_apre, edad_apre FROM aprendiz WHERE dni_apre= ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('s', $identificacion);
        $stmt->execute();
        $stmt->bind_result($idapre, $nombre, $apellidos, $tipo_documento, $numero_documento, $edad);
        
        $result = $stmt->fetch();

        if ($result) {
            return [
                'id_apre' => $idapre,
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'tipo_documento' => $tipo_documento,
                'numero_documento' => $numero_documento,
                'edad' => $edad
            ];
        } else {
            return null;
        }
    }
    public function actualizarDatosUsuario($id_apre, $nombre, $apellidos, $tipo_documento, $numero_documento, $edad) {
        $query = "UPDATE aprendiz SET name_apre = ?, ape_apre = ?, tipo_docu_apre = ?, dni_apre = ?, edad_apre = ? WHERE id_apre = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('sssssi', $nombre, $apellidos, $tipo_documento, $numero_documento, $edad, $id_apre);
        $result = $stmt->execute();

        return $result;
    }


    public function Tamizenfe($data) {
        $query = "INSERT INTO tamiz_salud (id_apre, name_taz, ult_examen_fisico_taz, cirugia_taz, cirugia_cual_taz, sintomas_inusuales_taz, sintomas_inusuales_cual_taz, convulsiones_taz, sustancias_psicoactivas_taz, sustancias_psicoactivas_cual_taz, bebidas_alcoholicas_taz, presion_arterial_taz, frecuencia_cardiaca_taz, frecuencia_respiratoria_taz, saturacion_taz, temperatura_taz, peso_taz, talla_taz, observaciones_taz) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('issssssssssssssssssssssssssss', 
            $data['id_apre'], 
            $data['name_taz'], 
            $data['ult_examen_fisico_taz'], 
            $data['cirugia_taz'], 
            $data['cirugia_cual_taz'], 
            $data['sintomas_inusuales_taz'], 
            $data['sintomas_inusuales_cual_taz'], 
            $data['convulsiones_taz'], 
            $data['sustancias_psicoactivas_taz'], 
            $data['sustancias_psicoactivas_cual_taz'], 
            $data['bebidas_alcoholicas_taz'], 
            $data['presion_arterial_taz'], 
            $data['frecuencia_cardiaca_taz'], 
            $data['frecuencia_respiratoria_taz'], 
            $data['saturacion_taz'], 
            $data['temperatura_taz'], 
            $data['peso_taz'], 
            $data['talla_taz'], 
            $data['observaciones_taz']
        ); 
        $result = $stmt->execute();
        return $result;
    }
    public function Tamizpsico($data) {
        // Preparar la consulta SQL con los nombres de columna y marcadores de posición
        $query = "INSERT INTO tamiz_psico (
            id_apre, name_taz, sustancias_psicoactivas_taz, sustancias_psicoactivas_cual_taz, bebidas_alcoholicas_taz, enfermedad_mental_taz, triste_ultimo_mes_taz, triste_ultimo_mes_por_que_taz, con_quien_vive_taz, relacion_personas_taz, medio_transporte_taz, medio_transporte_otro_taz, origen_ingresos_taz, origen_ingresos_otro_taz, apoyo_familiar_taz, tipo_apoyo_taz, dificultad_ultimo_mes_taz, dificultad_ultimo_mes_cual_taz, ayuda_problema_taz, ayuda_problema_otro_taz, aprobacion_padres_taz, satisfaccion_titulacion_taz, satisfaccion_titulacion_por_que_taz, dificultad_adaptarse_taz, interrelacion_instructores_taz, relacion_compañeros_taz, 
            observaciones_taz
        ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('issssssssssssssssssssssssss',
            $data['id_apre'], 
            $data['name_taz'], 
            $data['sustancias_psicoactivas_taz'], 
            $data['sustancias_psicoactivas_cual_taz'], 
            $data['bebidas_alcoholicas_taz'], 
            $data['enfermedad_mental_taz'], 
            $data['triste_ultimo_mes_taz'], 
            $data['triste_ultimo_mes_por_que_taz'], 
            $data['con_quien_vive_taz'], 
            $data['relacion_personas_taz'], 
            $data['medio_transporte_taz'], 
            $data['medio_transporte_otro_taz'], 
            $data['origen_ingresos_taz'], 
            $data['origen_ingresos_otro_taz'], 
            $data['apoyo_familiar_taz'], 
            $data['tipo_apoyo_taz'], 
            $data['dificultad_ultimo_mes_taz'], 
            $data['dificultad_ultimo_mes_cual_taz'], 
            $data['ayuda_problema_taz'], 
            $data['ayuda_problema_otro_taz'], 
            $data['aprobacion_padres_taz'], 
            $data['satisfaccion_titulacion_taz'], 
            $data['satisfaccion_titulacion_por_que_taz'], 
            $data['dificultad_adaptarse_taz'], 
            $data['interrelacion_instructores_taz'], 
            $data['relacion_compañeros_taz'], 
            $data['observaciones_taz']
        );
        $result = $stmt->execute();
        return $result;
    }
    
    
    
    public function buscarPorIdconsultaEnfe($identificacion) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE dni_apre = ?");
        $stmt->bind_param("s", $identificacion);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendiz = $result->fetch_assoc();
    
        if (!$aprendiz) {
            return ["error" => "No se encontraron datos para la identificación proporcionada en la tabla aprendiz."];
        }

        $id_apre = $aprendiz['id_apre'];
        $stmt = $this->conexion->prepare("SELECT * FROM tamiz_salud WHERE id_apre = ?");
        $stmt->bind_param("i", $id_apre);
        $stmt->execute();
        $result = $stmt->get_result();
        $tamiz_salud = $result->fetch_all(MYSQLI_ASSOC);

        $aprendiz['tamiz_salud'] = $tamiz_salud;

        if (empty($tamiz_salud)) {
            return ["error" => "No se encontraron datos en la tabla tamiz_salud para el aprendiz con la identificación proporcionada."];
        }
    
        return $aprendiz;
    }
    
    public function buscarPorJornadaEnfe($jornada) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre,numero_ficha_apre, jornada_apre FROM aprendiz WHERE jornada_apre = ?");
        $stmt->bind_param("s", $jornada);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendices = $result->fetch_all(MYSQLI_ASSOC);
    
        // Si no se encuentran aprendices, devolver un mensaje de error
        if (empty($aprendices)) {
            return ["error" => "No se encontraron aprendices para la jornada proporcionada en la tabla aprendiz."];
        }
    
        $encontradoEnTamiz = false;
        foreach ($aprendices as &$aprendiz) {
            $id_apre = $aprendiz['id_apre'];
            $stmt = $this->conexion->prepare("SELECT * FROM tamiz_salud WHERE id_apre = ?");
            $stmt->bind_param("i", $id_apre);
            $stmt->execute();
            $result = $stmt->get_result();
            $tamiz_salud = $result->fetch_all(MYSQLI_ASSOC);
            $aprendiz['tamiz_salud'] = $tamiz_salud;
    
            if (!empty($tamiz_salud)) {
                $encontradoEnTamiz = true;
            }
        }
    
        // Si no se encuentran datos en tamiz_salud, devolver un mensaje de error
        if (!$encontradoEnTamiz) {
            return ["error" => "No se encontraron datos en la tabla tamiz_salud para los aprendices con la jornada proporcionada."];
        }
    
        return $aprendices;
    }
    
    public function buscarPorFichaEnfe($numeroFicha) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE numero_ficha_apre = ?");
        $stmt->bind_param("s", $numeroFicha);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendices = $result->fetch_all(MYSQLI_ASSOC);
    
        // Si no se encuentran aprendices, devolver un mensaje de error
        if (empty($aprendices)) {
            return ["error" => "No se encontraron aprendices para el número de ficha proporcionado en la tabla aprendiz."];
        }
    
        $encontradoEnTamiz = false;
        foreach ($aprendices as &$aprendiz) {
            $id_apre = $aprendiz['id_apre'];
            $stmt = $this->conexion->prepare("SELECT * FROM tamiz_salud WHERE id_apre = ?");
            $stmt->bind_param("i", $id_apre);
            $stmt->execute();
            $result = $stmt->get_result();
            $tamiz_salud = $result->fetch_all(MYSQLI_ASSOC);
            $aprendiz['tamiz_salud'] = $tamiz_salud;
    
            if (!empty($tamiz_salud)) {
                $encontradoEnTamiz = true;
            }
        }
    
        if (!$encontradoEnTamiz) {
            return ["error" => "No se encontraron datos en la tabla tamiz_salud para los aprendices con el número de ficha proporcionado."];
        }
    
        return $aprendices;
    }

    public function buscarPorIdconsultaPsico($identificacion) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE dni_apre = ?");
        $stmt->bind_param("s", $identificacion);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendiz = $result->fetch_assoc();
    
        if (!$aprendiz) {
            return ["error" => "No se encontraron datos para la identificación proporcionada en la tabla aprendiz."];
        }

        $id_apre = $aprendiz['id_apre'];
        $stmt = $this->conexion->prepare("SELECT * FROM tamiz_psico WHERE id_apre = ?");
        $stmt->bind_param("i", $id_apre);
        $stmt->execute();
        $result = $stmt->get_result();
        $tamiz_psico = $result->fetch_all(MYSQLI_ASSOC);

        $aprendiz['tamiz_psico'] = $tamiz_psico;

        if (empty($tamiz_psico)) {
            return ["error" => "No se encontraron datos en la tabla tamiz_psico para el aprendiz con la identificación proporcionada."];
        }
    
        return $aprendiz;
    }
    
    public function buscarPorJornadaPsico($jornada) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre,numero_ficha_apre, jornada_apre FROM aprendiz WHERE jornada_apre = ?");
        $stmt->bind_param("s", $jornada);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendices = $result->fetch_all(MYSQLI_ASSOC);
    
        // Si no se encuentran aprendices, devolver un mensaje de error
        if (empty($aprendices)) {
            return ["error" => "No se encontraron aprendices para la jornada proporcionada en la tabla aprendiz."];
        }
    
        $encontradoEnTamiz = false;
        foreach ($aprendices as &$aprendiz) {
            $id_apre = $aprendiz['id_apre'];
            $stmt = $this->conexion->prepare("SELECT * FROM tamiz_psico WHERE id_apre = ?");
            $stmt->bind_param("i", $id_apre);
            $stmt->execute();
            $result = $stmt->get_result();
            $tamiz_psico = $result->fetch_all(MYSQLI_ASSOC);
            $aprendiz['tamiz_psico'] = $tamiz_psico;
    
            if (!empty($tamiz_psico)) {
                $encontradoEnTamiz = true;
            }
        }

        if (!$encontradoEnTamiz) {
            return ["error" => "No se encontraron datos en la tabla tamiz_psico para los aprendices con la jornada proporcionada."];
        }
    
        return $aprendices;
    }
    
    public function buscarPorFichaPsico($numeroFicha) {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE numero_ficha_apre = ?");
        $stmt->bind_param("s", $numeroFicha);
        $stmt->execute();
        $result = $stmt->get_result();
        $aprendices = $result->fetch_all(MYSQLI_ASSOC);
    
        // Si no se encuentran aprendices, devolver un mensaje de error
        if (empty($aprendices)) {
            return ["error" => "No se encontraron aprendices para el número de ficha proporcionado en la tabla aprendiz."];
        }
    
        $encontradoEnTamiz = false;
        foreach ($aprendices as &$aprendiz) {
            $id_apre = $aprendiz['id_apre'];
            $stmt = $this->conexion->prepare("SELECT * FROM tamiz_psico WHERE id_apre = ?");
            $stmt->bind_param("i", $id_apre);
            $stmt->execute();
            $result = $stmt->get_result();
            $tamiz_psico = $result->fetch_all(MYSQLI_ASSOC);
            $aprendiz['tamiz_psico'] = $tamiz_psico;
    
            if (!empty($tamiz_psico)) {
                $encontradoEnTamiz = true;
            }
        }
    
        // Si no se encuentran datos en tamiz_psico, devolver un mensaje de error
        if (!$encontradoEnTamiz) {
            return ["error" => "No se encontraron datos en la tabla tamiz_psico para los aprendices con el número de ficha proporcionado."];
        }
    
        return $aprendices;
    }
    
    
    
    
  
    
}
?>