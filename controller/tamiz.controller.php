<?php

include_once "model/tamiz.php";
require 'lib/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class TamizController
{
    private $object;
    private $conexion;

    public function __construct()
    {
        $this->object = new Tamiz();
        $this->conexion = databaseConexion::conexion();
    }

    public function inicio()
    {


        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tamices.css'>";

        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/tamices.php";
        require_once "view/boostrap/footer.php";

        // Verificar la sesión antes de cargar cualquier controlador o acción
        verificarSesion();
    }

    public function enfe()
    {
        require_once "view/tamiz/nuevo/add_enfe.php";
    }

    public function psico()
    {
        require_once "view/tamiz/nuvo/add_psico.php";
    }

    public function busenfe()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tami-bus.css'>";
        $datos = [];

        if (isset($_POST['identificacion']) && !empty($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $datos[] = $this->object->buscarPorIdconsulta($identificacion);
        } elseif (isset($_POST['jornada']) && !empty($_POST['jornada'])) {
            $jornada = $_POST['jornada'];
            $datos = $this->object->buscarPorJornada($jornada);
        } elseif (isset($_POST['ficha']) && !empty($_POST['ficha'])) {
            $ficha = $_POST['ficha'];
            $datos = $this->object->buscarPorFicha($ficha);
        }

        if (!is_array($datos)) {
            $datos = [];
        }

        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/bus/tami-busenfe.php";
        require_once "view/boostrap/footer.php";
    }

    public function exportarDatos()
    {
        // Obtener los datos que vienen del formulario
        if (isset($_POST['datos_exportar'])) {
            $datos = json_decode($_POST['datos_exportar'], true);

            // Crear un nuevo objeto Spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('todos los datos');

            // Agregar encabezados de columna (si es necesario)
            $encabezados = [
                'Nombre', 'DNI', 'Jornada', 'ID Tamiz', 'Nombre Tamiz', 'Último Examen Físico',
                'Cirugía', 'Cirugía Cuál', 'Síntomas Inusuales', 'Síntomas Inusuales Cuál',
                'Convulsiones', 'Sustancias Psicoactivas', 'Sustancias Psicoactivas Cuál',
                'Bebidas Alcohólicas', 'Presión Arterial', 'Frecuencia Cardíaca',
                'Frecuencia Respiratoria', 'Saturación', 'Temperatura', 'Peso', 'Talla',
                'Observaciones'
            ];

            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }

            // Agregar datos a la hoja de cálculo
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet->setCellValue([1, $rowIndex], isset($aprendiz['name_apre']) ? $aprendiz['name_apre'] : '');
                    $sheet->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet->setCellValue([3, $rowIndex], isset($aprendiz['jornada_apre']) ? $aprendiz['jornada_apre'] : '');
                    $sheet->setCellValue([4, $rowIndex], isset($tamiz['id_taz']) ? $tamiz['id_taz'] : '');
                    $sheet->setCellValue([5, $rowIndex], isset($tamiz['name_taz']) ? $tamiz['name_taz'] : '');
                    $sheet->setCellValue([6, $rowIndex], isset($tamiz['ult_examen_fisico_taz']) ? $tamiz['ult_examen_fisico_taz'] : '');
                    $sheet->setCellValue([7, $rowIndex], isset($tamiz['cirugia_taz']) ? $tamiz['cirugia_taz'] : '');
                    $sheet->setCellValue([8, $rowIndex], isset($tamiz['cirugia_cual_taz']) ? $tamiz['cirugia_cual_taz'] : '');
                    $sheet->setCellValue([9, $rowIndex], isset($tamiz['sintomas_inusuales_taz']) ? $tamiz['sintomas_inusuales_taz'] : '');
                    $sheet->setCellValue([10, $rowIndex], isset($tamiz['sintomas_inusuales_cual_taz']) ? $tamiz['sintomas_inusuales_cual_taz'] : '');
                    $sheet->setCellValue([11, $rowIndex], isset($tamiz['convulsiones_taz']) ? $tamiz['convulsiones_taz'] : '');
                    $sheet->setCellValue([12, $rowIndex], isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : '');
                    $sheet->setCellValue([13, $rowIndex], isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : '');
                    $sheet->setCellValue([14, $rowIndex], isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : '');
                    $sheet->setCellValue([15, $rowIndex], isset($tamiz['presion_arterial_taz']) ? $tamiz['presion_arterial_taz'] : '');
                    $sheet->setCellValue([16, $rowIndex], isset($tamiz['frecuencia_cardiaca_taz']) ? $tamiz['frecuencia_cardiaca_taz'] : '');
                    $sheet->setCellValue([17, $rowIndex], isset($tamiz['frecuencia_respiratoria_taz']) ? $tamiz['frecuencia_respiratoria_taz'] : '');
                    $sheet->setCellValue([18, $rowIndex], isset($tamiz['saturacion_taz']) ? $tamiz['saturacion_taz'] : '');
                    $sheet->setCellValue([19, $rowIndex], isset($tamiz['temperatura_taz']) ? $tamiz['temperatura_taz'] : '');
                    $sheet->setCellValue([20, $rowIndex], isset($tamiz['peso_taz']) ? $tamiz['peso_taz'] : '');
                    $sheet->setCellValue([21, $rowIndex], isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : '');
                    $sheet->setCellValue([22, $rowIndex], isset($tamiz['observaciones_taz']) ? $tamiz['observaciones_taz'] : '');

                    $rowIndex++;
                }
            }


            // Hoja secundaria 
            $sheet2 = $spreadsheet->createSheet();
            $sheet2->setTitle('Examen Físico');

            $encabezados = [
                ' ', 'DNI', 'Último Examen Físico',
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet2->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet2->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet2->setCellValue([3, $rowIndex], isset($tamiz['ult_examen_fisico_taz']) ? $tamiz['ult_examen_fisico_taz'] : '');
                    $rowIndex++;
                }
            }

            // Hoja secundaria 
            $sheet3 = $spreadsheet->createSheet();
            $sheet3->setTitle('Cirugía');
            $encabezados = [
                ' ', 'DNI', 'Cirugía', 'Cirugía Cuál'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet3->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet3->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet3->setCellValue([3, $rowIndex],  isset($tamiz['cirugia_taz']) ? $tamiz['cirugia_taz'] : '');
                    $sheet3->setCellValue([4, $rowIndex],  isset($tamiz['cirugia_cual_taz']) ? $tamiz['cirugia_cual_taz'] : '');
                    $rowIndex++;
                }
            }

            // Hoja secundaria 
            $sheet4 = $spreadsheet->createSheet();
            $sheet4->setTitle('Síntomas Inusuales');
            $encabezados = [
                ' ', 'DNI', 'Síntomas Inusuales', 'Síntomas Inusuales Cuál'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet4->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet4->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet4->setCellValue([3, $rowIndex],  isset($tamiz['sintomas_inusuales_taz']) ? $tamiz['sintomas_inusuales_taz'] : '');
                    $sheet4->setCellValue([4, $rowIndex],  isset($tamiz['sintomas_inusuales_cual_taz']) ? $tamiz['sintomas_inusuales_cual_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet5 = $spreadsheet->createSheet();
            $sheet5->setTitle('Convulsiones');
            $encabezados = [
                ' ', 'DNI', 'Convulsiones'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet5->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet5->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet5->setCellValue([3, $rowIndex],   isset($tamiz['convulsiones_taz']) ? $tamiz['convulsiones_taz'] : '');
                    $rowIndex++;
                }
            }

            // Hoja secundaria 
            $sheet6 = $spreadsheet->createSheet();
            $sheet6->setTitle('Sustancias Psicoactivas');
            $encabezados = [
                ' ', 'DNI', 'Sustancias Psicoactivas', 'Sustancias Psicoactivas Cuál',
                'Bebidas Alcohólicas'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet6->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet6->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet6->setCellValue([3, $rowIndex],  isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : '');
                    $sheet6->setCellValue([4, $rowIndex],  isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : '');
                    $sheet6->setCellValue([5, $rowIndex],  isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet7 = $spreadsheet->createSheet();
            $sheet7->setTitle('Presión Arterial');
            $encabezados = [
                ' ', 'DNI', 'Presión Arterial'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet7->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet7->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet7->setCellValue([3, $rowIndex],  isset($tamiz['presion_arterial_taz']) ? $tamiz['presion_arterial_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet8 = $spreadsheet->createSheet();
            $sheet8->setTitle('Frecuencia Cardíaca');
            $encabezados = [
                ' ', 'DNI', 'Frecuencia Cardíaca'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet8->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet8->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet8->setCellValue([3, $rowIndex],  isset($tamiz['frecuencia_cardiaca_taz']) ? $tamiz['frecuencia_cardiaca_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet9 = $spreadsheet->createSheet();
            $sheet9->setTitle('Frecuencia Respiratoria');
            $encabezados = [
                ' ', 'DNI', 'Frecuencia Respiratoria'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet9->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet9->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet9->setCellValue([3, $rowIndex],  isset($tamiz['frecuencia_respiratoria_taz']) ? $tamiz['frecuencia_respiratoria_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet10 = $spreadsheet->createSheet();
            $sheet10->setTitle('Saturación');
            $encabezados = [
                ' ', 'DNI', 'Saturación'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet10->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet10->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet10->setCellValue([3, $rowIndex], isset($tamiz['saturacion_taz']) ? $tamiz['saturacion_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet11 = $spreadsheet->createSheet();
            $sheet11->setTitle('Temperatura');
            $encabezados = [
                ' ', 'DNI', 'Temperatura'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet11->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet11->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet11->setCellValue([3, $rowIndex], isset($tamiz['temperatura_taz']) ? $tamiz['temperatura_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet12 = $spreadsheet->createSheet();
            $sheet12->setTitle('Peso');
            $encabezados = [
                ' ', 'DNI', 'Peso'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet12->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet12->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet12->setCellValue([3, $rowIndex], isset($tamiz['peso_taz']) ? $tamiz['peso_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet12 = $spreadsheet->createSheet();
            $sheet12->setTitle('Talla');
            $encabezados = [
                ' ', 'DNI', 'Talla'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet12->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet12->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet12->setCellValue([3, $rowIndex], isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : '');
                    $rowIndex++;
                }
            }
            // Hoja secundaria 
            $sheet13 = $spreadsheet->createSheet();
            $sheet13->setTitle('MVC');
            $encabezados = [
                ' ', 'DNI', 'Peso', 'Talla'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet13->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet13->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet13->setCellValue([3, $rowIndex], isset($tamiz['peso_taz']) ? $tamiz['peso_taz'] : '');
                    $sheet13->setCellValue([4, $rowIndex], isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : '');
                    $rowIndex++;
                }
            }

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="datos.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;
        } else {
            header('Location: ?b=Tamiz');
            exit;
        }
    }




    public function buscarPorIdentificacion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $usuario = $this->object->buscarPorIdentificacion($identificacion);

            require_once "view/tamiz/nuevo/add_enfe.php";
        }
    }

    public function guarTamizEnfe()
    {
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

    public function actualizarDatosUsuario()
    {
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
