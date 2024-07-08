<?php

include_once "model/tamiz.php";

class TamizController {
    private $object;

    public function __construct() {
        $this->object = new Tamiz();
    }

    public function inicio() {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tamices.css'>";
        
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/tamices.php";
        require_once "view/boostrap/footer.php";
    }

    public function enfe() {
        require_once "view/tamiz/add_enfe.php";
    }

    public function psico() {
        require_once "view/tamiz/add_psico.php";
    }

    public function busenfe() {
        require_once "view/tamiz/tami-busenfe.php";
    }

    public function buscarPorIdentificacion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $usuario = $this->object->buscarPorIdentificacion($identificacion);
            
            require_once "view/tamiz/add_enfe.php";
        }
    }

    public function guarTamizEnfe() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_apre' => $_POST['id_apre'],
                'name_taz' => $_POST['name_taz'],
                'ult_examen_fisico_taz' => $_POST['ult_examen_fisico_taz'],
                'cirugia_taz' => $_POST['cirugia_taz'],
                'cirugia_cual_taz' => $_POST['cirugia_cual_taz'],
                'sintomas_inusuales_taz' => $_POST['sintomas_inusuales_taz'],
                'sintomas_inusuales_cual_taz' => $_POST['sintomas_inusuales_cual_taz'],
                'convulsiones_taz' => $_POST['convulsiones_taz'],
                'sustancias_psicoactivas_taz' => $_POST['sustancias_psicoactivas_taz'],
                'sustancias_psicoactivas_cual_taz' => $_POST['sustancias_psicoactivas_cual_taz'],
                'bebidas_alcoholicas_taz' => $_POST['bebidas_alcoholicas_taz'],
                'presion_arterial_taz' => $_POST['presion_arterial_taz'],
                'frecuencia_cardiaca_taz' => $_POST['frecuencia_cardiaca_taz'],
                'frecuencia_respiratoria_taz' => $_POST['frecuencia_respiratoria_taz'],
                'saturacion_taz' => $_POST['saturacion_taz'],
                'temperatura_taz' => $_POST['temperatura_taz'],
                'peso_taz' => $_POST['peso_taz'],
                'talla_taz' => $_POST['talla_taz'],
                'observaciones_taz' => $_POST['observaciones_taz']
            ];
            $result = $this->object->Tamizenfe($data);

            if ($result) {
                header("Location: ?b=enfermeria&message=Datos insertados correctamente");
                exit();
            } else {
                header("Location: ?b=enfermeria&message=Error al insertar los datos");
                exit();
            }
        }
    }

    public function actualizarDatosUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_apre']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['tipo_documento']) && isset($_POST['numero_documento']) && isset($_POST['edad'])) {
            $id_apre = $_POST['id_apre'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $tipo_documento = $_POST['tipo_documento'];
            $numero_documento = $_POST['numero_documento'];
            $edad = $_POST['edad'];

            $success = $this->object->actualizarDatosUsuario($id_apre, $nombre, $apellidos, $tipo_documento, $numero_documento, $edad);

            if ($success) {
                echo "Datos actualizados correctamente.";
            } else {
                echo "Error al actualizar los datos.";
            }
        }
    }
}
