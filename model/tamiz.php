<?php

class Tamiz
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }
    public function selectUser($username)
    {
        $sql = "SELECT * FROM delegados WHERE user_del = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }

    public function buscarPorIdentificacion($identificacion)
    {
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
    // update de apre
    public function buscarPor($id_apre)
    {
        $query = "SELECT id_apre, name_apre, ape_apre, tipo_docu_apre, dni_apre, edad_apre, esta_civil_apre, sexo_apre, iden_gene_apre, grup_etn_apre, grup_etn_cual_apre, estr_apre, zona_resi_apre, lugar_resi_apre, vivie_apre, servicios_publicos_apre, tiempo_libre_apre, hijos_apre, embarazo_apre, control_prenatal_apre, diag_medico_apre, diag_medico_cual_apre, medica_apre, medica_cual_apre, limitaciones_apre, antecedentes_familiares_apre, antecedentes_familiares_otro_apre, numero_celular_apre, correo_apre, numero_ficha_apre, jornada_apre, contac_emergen_apre, numero_contac_emergen_apre FROM aprendiz                    WHERE id_apre = ?";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('i', $id_apre);
        $stmt->execute();
        $stmt->bind_result(
            $id_apre,
            $name_apre,
            $ape_apre,
            $tipo_docu_apre,
            $dni_apre,
            $edad_apre,
            $esta_civil_apre,
            $sexo_apre,
            $iden_gene_apre,
            $grup_etn_apre,
            $grup_etn_cual_apre,
            $estr_apre,
            $zona_resi_apre,
            $lugar_resi_apre,
            $vivie_apre,
            $servicios_publicos_apre,
            $tiempo_libre_apre,
            $hijos_apre,
            $embarazo_apre,
            $control_prenatal_apre,
            $diag_medico_apre,
            $diag_medico_cual_apre,
            $medica_apre,
            $medica_cual_apre,
            $limitaciones_apre,
            $antecedentes_familiares_apre,
            $antecedentes_familiares_otro_apre,
            $numero_celular_apre,
            $correo_apre,
            $numero_ficha_apre,
            $jornada_apre,
            $contac_emergen_apre,
            $numero_contac_emergen_apre
        );

        $result = $stmt->fetch();

        if ($result) {
            return [
                'id_apre' => $id_apre,
                'name_apre' => $name_apre,
                'ape_apre' => $ape_apre,
                'tipo_docu_apre' => $tipo_docu_apre,
                'dni_apre' => $dni_apre,
                'edad_apre' => $edad_apre,
                'esta_civil_apre' => $esta_civil_apre,
                'sexo_apre' => $sexo_apre,
                'iden_gene_apre' => $iden_gene_apre,
                'grup_etn_apre' => $grup_etn_apre,
                'grup_etn_cual_apre' => $grup_etn_cual_apre,
                'estr_apre' => $estr_apre,
                'zona_resi_apre' => $zona_resi_apre,
                'lugar_resi_apre' => $lugar_resi_apre,
                'vivie_apre' => $vivie_apre,
                'servicios_publicos_apre' => $servicios_publicos_apre,
                'tiempo_libre_apre' => $tiempo_libre_apre,
                'hijos_apre' => $hijos_apre,
                'embarazo_apre' => $embarazo_apre,
                'control_prenatal_apre' => $control_prenatal_apre,
                'diag_medico_apre' => $diag_medico_apre,
                'diag_medico_cual_apre' => $diag_medico_cual_apre,
                'medica_apre' => $medica_apre,
                'medica_cual_apre' => $medica_cual_apre,
                'limitaciones_apre' => $limitaciones_apre,
                'antecedentes_familiares_apre' => $antecedentes_familiares_apre,
                'antecedentes_familiares_otro_apre' => $antecedentes_familiares_otro_apre,
                'numero_celular_apre' => $numero_celular_apre,
                'correo_apre' => $correo_apre,
                'numero_ficha_apre' => $numero_ficha_apre,
                'jornada_apre' => $jornada_apre,
                'contac_emergen_apre' => $contac_emergen_apre,
                'numero_contac_emergen_apre' => $numero_contac_emergen_apre
            ];
        } else {
            return null;
        }
    }


    public function actualizarDatosUsuario($id_apre, $name_apre, $ape_apre, $tipo_docu_apre, $dni_apre, $edad_apre, $esta_civil_apre, $sexo_apre, $iden_gene_apre, $grup_etn_apre, $grup_etn_cual_apre, $estr_apre, $zona_resi_apre, $lugar_resi_apre, $vivie_apre, $servicios_publicos_apre, $tiempo_libre_apre, $hijos_apre, $embarazo_apre, $control_prenatal_apre, $diag_medico_apre, $diag_medico_cual_apre, $medica_apre, $medica_cual_apre, $limitaciones_apre, $antecedentes_familiares_apre, $antecedentes_familiares_otro_apre, $numero_celular_apre, $correo_apre, $numero_ficha_apre, $jornada_apre, $contac_emergen_apre, $numero_contac_emergen_apre)
    {
        $query = "UPDATE aprendiz SET 
                name_apre = ?,
                ape_apre = ?,
                tipo_docu_apre = ?,
                dni_apre = ?,
                edad_apre = ?,
                esta_civil_apre = ?,
                sexo_apre = ?,
                iden_gene_apre = ?,
                grup_etn_apre = ?,
                grup_etn_cual_apre = ?,
                estr_apre = ?,
                zona_resi_apre = ?,
                lugar_resi_apre = ?,
                vivie_apre = ?,
                servicios_publicos_apre = ?,
                tiempo_libre_apre = ?,
                hijos_apre = ?,
                embarazo_apre = ?,
                control_prenatal_apre = ?,
                diag_medico_apre = ?,
                diag_medico_cual_apre = ?,
                medica_apre = ?,
                medica_cual_apre = ?,
                limitaciones_apre = ?,
                antecedentes_familiares_apre = ?,
                antecedentes_familiares_otro_apre = ?,
                numero_celular_apre = ?,
                correo_apre = ?,
                numero_ficha_apre = ?,
                jornada_apre = ?,
                contac_emergen_apre = ?,
                numero_contac_emergen_apre = ?
              WHERE id_apre = ?";

        $stmt = $this->conexion->prepare($query);
        if (!$stmt) {
            die('Error en la preparación de la consulta: ' . $this->conexion->error);
        }

        $stmt->bind_param(
            'ssssissssssssssssssssssssssssssss',
            $name_apre,
            $ape_apre,
            $tipo_docu_apre,
            $dni_apre,
            $edad_apre,
            $esta_civil_apre,
            $sexo_apre,
            $iden_gene_apre,
            $grup_etn_apre,
            $grup_etn_cual_apre,
            $estr_apre,
            $zona_resi_apre,
            $lugar_resi_apre,
            $vivie_apre,
            $servicios_publicos_apre,
            $tiempo_libre_apre,
            $hijos_apre,
            $embarazo_apre,
            $control_prenatal_apre,
            $diag_medico_apre,
            $diag_medico_cual_apre,
            $medica_apre,
            $medica_cual_apre,
            $limitaciones_apre,
            $antecedentes_familiares_apre,
            $antecedentes_familiares_otro_apre,
            $numero_celular_apre,
            $correo_apre,
            $numero_ficha_apre,
            $jornada_apre,
            $contac_emergen_apre,
            $numero_contac_emergen_apre,
            $id_apre
        );

        if ($stmt->execute()) {
            return true;
        } else {
            die('Error en la ejecución de la consulta: ' . $stmt->error);
        }

        $stmt->close();
    }



    public function Tamizenfe($data)
    {
        $query = "INSERT INTO tamiz_salud (id_apre, name_taz, ult_examen_fisico_taz, cirugia_taz, cirugia_cual_taz, sintomas_inusuales_taz, sintomas_inusuales_cual_taz, convulsiones_taz, sustancias_psicoactivas_taz, sustancias_psicoactivas_cual_taz, bebidas_alcoholicas_taz, presion_arterial_taz, frecuencia_cardiaca_taz, frecuencia_respiratoria_taz, saturacion_taz, temperatura_taz, peso_taz, talla_taz, observaciones_taz) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(
            'issssssssssssssssssssssssssss',
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
    public function Tamizpsico($data)
    {
        // Preparar la consulta SQL con los nombres de columna y marcadores de posición
        $query = "INSERT INTO tamiz_psico (
            id_apre, name_taz, sustancias_psicoactivas_taz, sustancias_psicoactivas_cual_taz, bebidas_alcoholicas_taz, enfermedad_mental_taz, triste_ultimo_mes_taz, triste_ultimo_mes_por_que_taz, con_quien_vive_taz, relacion_personas_taz, medio_transporte_taz, medio_transporte_otro_taz, origen_ingresos_taz, origen_ingresos_otro_taz, apoyo_familiar_taz, tipo_apoyo_taz, dificultad_ultimo_mes_taz, dificultad_ultimo_mes_cual_taz, ayuda_problema_taz, ayuda_problema_otro_taz, aprobacion_padres_taz, satisfaccion_titulacion_taz, satisfaccion_titulacion_por_que_taz, dificultad_adaptarse_taz, interrelacion_instructores_taz, relacion_compañeros_taz, 
            observaciones_taz
        ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param(
            'issssssssssssssssssssssssss',
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


    public function buscarPorIdconsultaEnfe($identificacion)
    {
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

    public function buscarPorJornadaEnfe($jornada)
    {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE jornada_apre = ?");
        $stmt->bind_param("s", $jornada);
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

    public function buscarPorFichaEnfe($ficha)
    {
        $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE numero_ficha_apre = ?");
        $stmt->bind_param("s", $ficha);
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


    public function buscarPorIdconsultaPsico($identificacion)
    {
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
    public function buscarPorJornadaPsico($jornada)
{
    $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE jornada_apre = ?");
    $stmt->bind_param("s", $jornada);
    $stmt->execute();
    $result = $stmt->get_result();
    $aprendices = $result->fetch_all(MYSQLI_ASSOC);

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

public function buscarPorFichaPsico($numeroFicha)
{
    $stmt = $this->conexion->prepare("SELECT id_apre, name_apre, dni_apre, numero_ficha_apre, jornada_apre FROM aprendiz WHERE numero_ficha_apre = ?");
    $stmt->bind_param("s", $numeroFicha);
    $stmt->execute();
    $result = $stmt->get_result();
    $aprendices = $result->fetch_all(MYSQLI_ASSOC);

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

    if (!$encontradoEnTamiz) {
        return ["error" => "No se encontraron datos en la tabla tamiz_psico para los aprendices con el número de ficha proporcionado."];
    }

    return $aprendices;
}

}
