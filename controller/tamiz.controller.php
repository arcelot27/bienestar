<?php

include_once "model/tamiz.php";
require 'lib/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\{Chart, DataSeries, DataSeriesValues, Layout, Legend, PlotArea, Title};

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
        if (!isset($_SESSION['usuario'])) {
            $mensaje = "Debe iniciar sesión para acceder a esta página";
            header("Location: ?b=login&mensaje=" . urlencode($mensaje));
            exit();
        }

        $usuario = $_SESSION['usuario'];
        $user = $this->object->selectUser($usuario);

        $_SESSION['name'] = $user['name_del'];
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tamices.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/tamices.php";
        require_once "view/boostrap/footer.php";
    }

    public function enfe()
    {
        require_once "view/tamiz/nuevo/add_enfe.php";
    }

    public function psico()
    {
        require_once "view/tamiz/nuevo/add_psico.php";
    }

    public function busenfe()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tami-bus.css'>";
        $datos = [];

        if (isset($_POST['identificacion']) && !empty($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $datos[] = $this->object->buscarPorIdconsultaEnfe($identificacion);
        } elseif (isset($_POST['jornada']) && !empty($_POST['jornada'])) {
            $jornada = $_POST['jornada'];
            $datos = $this->object->buscarPorJornadaEnfe($jornada);
        } elseif (isset($_POST['ficha']) && !empty($_POST['ficha'])) {
            $ficha = $_POST['ficha'];
            $datos = $this->object->buscarPorFichaEnfe($ficha);
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
        if (isset($_POST['datos_exportar'])) {
            $datos = json_decode($_POST['datos_exportar'], true);

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('todos los datos');

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
            $tableRange = 'A1:V' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table');
            $sheet->addTable($table);

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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table2');
            $sheet2->addTable($table);

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
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table3');
            $sheet3->addTable($table);

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
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table4');
            $sheet4->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table5');
            $sheet5->addTable($table);
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
            $tableRange = 'B1:E' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table6');
            $sheet6->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table7');
            $sheet7->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table8');
            $sheet8->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table9');
            $sheet9->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table10');
            $sheet10->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table11');
            $sheet11->addTable($table);
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
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table12');
            $sheet12->addTable($table);
            // Hoja secundaria 
            $sheet13 = $spreadsheet->createSheet();
            $sheet13->setTitle('Talla');
            $encabezados = [
                ' ', 'DNI', 'Talla'
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
                    $sheet13->setCellValue([3, $rowIndex], isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table13');
            $sheet13->addTable($table);
            // Hoja secundaria 
            $sheet14 = $spreadsheet->createSheet();
            $sheet14->setTitle('MVC');
            $encabezados = [
                ' ', 'DNI', 'Peso', 'Talla'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet14->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_salud'] as $tamiz) {
                    $sheet14->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet14->setCellValue([3, $rowIndex], isset($tamiz['peso_taz']) ? $tamiz['peso_taz'] : '');
                    $sheet14->setCellValue([4, $rowIndex], isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table14');
            $sheet14->addTable($table);

            $fechaActual = (new DateTime())->format('Y-m-d');
            $nombreArchivo = "Tamizaje_Salud_$fechaActual.xlsx";
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment; filename=\"$nombreArchivo\"");
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            exit;
        } else {
            header('Location: ?b=Tamiz');
            exit;
        }
    }

    public function buscarPorIdentificacionenfe()
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


    public function devol()
    {
        session_start();
        if (isset($_SESSION['redirect_view'])) {
            header('Location: ?b=' . $_SESSION['redirect_view']);
            exit();
        } else {
            // Si no hay sesión, redirige a la página de inicio de sesión
            header('Location: ?b=login');
            exit();
        }
    }

    public function actualizarDatosUsuario()
    {
        if (isset($_GET['identificacion'])) {
            $id_apre = $_GET['identificacion'];
            $usuario = $this->object->buscarPor($id_apre);

            if ($usuario) {
                $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
                          <link rel='stylesheet' href='assets/css/aprendiz/add.css'>";
                require_once "view/boostrap/head.php";
                require_once "view/boostrap/heder_user.php";
                require_once "view/aprendiz/actualizar_datos.php";
                require_once "view/boostrap/footer.php";
            } else {
                echo "Usuario no encontrado";
            }
        } else {
            echo "ID no proporcionado";
        }
    }


    public function guardarDatosActualizados()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_apre'])) {
            // Aseguramos que las claves esperadas estén definidas en $_POST antes de acceder a ellas
            $id_apre = $_POST['id_apre'];
            $name_apre = isset($_POST['name_apre']) ? htmlspecialchars($_POST['name_apre']) : '';
            $ape_apre = isset($_POST['ape_apre']) ? htmlspecialchars($_POST['ape_apre']) : '';
            $tipo_docu_apre = isset($_POST['tipo_docu_apre']) ? htmlspecialchars($_POST['tipo_docu_apre']) : '';
            $dni_apre = isset($_POST['dni_apre']) ? htmlspecialchars($_POST['dni_apre']) : '';
            $edad_apre = isset($_POST['edad_apre']) ? (int)$_POST['edad_apre'] : 0;
            $esta_civil_apre = isset($_POST['esta_civil_apre']) ? htmlspecialchars($_POST['esta_civil_apre']) : '';
            $sexo_apre = isset($_POST['sexo_apre']) ? htmlspecialchars($_POST['sexo_apre']) : '';
            $iden_gene_apre = isset($_POST['iden_gene_apre']) ? htmlspecialchars($_POST['iden_gene_apre']) : '';
            $grup_etn_apre = isset($_POST['grup_etn_apre']) ? htmlspecialchars($_POST['grup_etn_apre']) : '';
            $grup_etn_cual_apre = isset($_POST['grup_etn_cual_apre']) ? htmlspecialchars($_POST['grup_etn_cual_apre']) : '';
            $estr_apre = isset($_POST['estr_apre']) ? htmlspecialchars($_POST['estr_apre']) : '';
            $zona_resi_apre = isset($_POST['zona_resi_apre']) ? htmlspecialchars($_POST['zona_resi_apre']) : '';
            $lugar_resi_apre = isset($_POST['lugar_resi_apre']) ? htmlspecialchars($_POST['lugar_resi_apre']) : '';
            $vivie_apre = isset($_POST['vivie_apre']) ? htmlspecialchars($_POST['vivie_apre']) : '';
            $servicios_publicos_apre = isset($_POST['servicios_publicos_apre']) ? htmlspecialchars($_POST['servicios_publicos_apre']) : '';
            $tiempo_libre_apre = isset($_POST['tiempo_libre_apre']) ? htmlspecialchars($_POST['tiempo_libre_apre']) : '';
            $hijos_apre = isset($_POST['hijos_apre']) ? (int)$_POST['hijos_apre'] : 0;
            $embarazo_apre = isset($_POST['embarazo_apre']) ? htmlspecialchars($_POST['embarazo_apre']) : '';
            $control_prenatal_apre = isset($_POST['control_prenatal_apre']) ? htmlspecialchars($_POST['control_prenatal_apre']) : '';
            $diag_medico_apre = isset($_POST['diag_medico_apre']) ? htmlspecialchars($_POST['diag_medico_apre']) : '';
            $diag_medico_cual_apre = isset($_POST['diag_medico_cual_apre']) ? htmlspecialchars($_POST['diag_medico_cual_apre']) : '';
            $medica_apre = isset($_POST['medica_apre']) ? htmlspecialchars($_POST['medica_apre']) : '';
            $medica_cual_apre = isset($_POST['medica_cual_apre']) ? htmlspecialchars($_POST['medica_cual_apre']) : '';
            $limitaciones_apre = isset($_POST['limitaciones_apre']) ? htmlspecialchars($_POST['limitaciones_apre']) : '';
            $antecedentes_familiares_apre = isset($_POST['antecedentes_familiares_apre']) ? htmlspecialchars($_POST['antecedentes_familiares_apre']) : '';
            $antecedentes_familiares_otro_apre = isset($_POST['antecedentes_familiares_otro_apre']) ? htmlspecialchars($_POST['antecedentes_familiares_otro_apre']) : '';
            $numero_celular_apre = isset($_POST['numero_celular_apre']) ? htmlspecialchars($_POST['numero_celular_apre']) : '';
            $correo_apre = isset($_POST['correo_apre']) ? htmlspecialchars($_POST['correo_apre']) : '';
            $numero_ficha_apre = isset($_POST['numero_ficha_apre']) ? htmlspecialchars($_POST['numero_ficha_apre']) : '';
            $jornada_apre = isset($_POST['jornada_apre']) ? htmlspecialchars($_POST['jornada_apre']) : '';
            $contac_emergen_apre = isset($_POST['contac_emergen_apre']) ? htmlspecialchars($_POST['contac_emergen_apre']) : '';
            $numero_contac_emergen_apre = isset($_POST['numero_contac_emergen_apre']) ? htmlspecialchars($_POST['numero_contac_emergen_apre']) : '';

            // Llamar al método del modelo para actualizar los datos del usuario
            $success = $this->object->actualizarDatosUsuario(
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

            // Verificar el resultado de la operación y redirigir según corresponda
            if ($success) {
                header('Location: ?b=tamiz&s=devol');
                exit();
            } else {
                echo "Error al actualizar los datos.";
            }
        }
    }


    public function buscarPorIdentificacioPsico()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $usuario = $this->object->buscarPorIdentificacion($identificacion);

            require_once "view/tamiz/nuevo/add_psico.php";
        }
    }

    public function guarTamizPsico()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Definir valores predeterminados
            $data = [
                'id_apre' => $_POST['id_apre'] ?? '',
                'name_taz' => $_POST['name_taz'] ?? '',
                'sustancias_psicoactivas_taz' => $_POST['sustanciasPsicoactivas'] ?? '',
                'sustancias_psicoactivas_cual_taz' => $_POST['sustanciasPsicoactivasCual'] ?? '',
                'bebidas_alcoholicas_taz' => $_POST['bebidasAlcoholicas'] ?? '',
                'enfermedad_mental_taz' => $_POST['diagnosticoEnfermedadMental'] ?? '',
                'triste_ultimo_mes_taz' => $_POST['tristeUltimoMes'] ?? '',
                'triste_ultimo_mes_por_que_taz' => $_POST['tristeUltimoMesPorQue'] ?? '',
                'con_quien_vive_taz' => $_POST['conQuienVive'] ?? '',
                'relacion_personas_taz' => $_POST['relacionPersonas'] ?? '',
                'medio_transporte_taz' => $_POST['medioTransporte'] ?? '',
                'medio_transporte_otro_taz' => $_POST['medioTransporteOtro'] ?? '',
                'origen_ingresos_taz' => $_POST['origenIngresos'] ?? '',
                'origen_ingresos_otro_taz' => $_POST['origenIngresosOtro'] ?? '',
                'apoyo_familiar_taz' => $_POST['apoyoFamiliar'] ?? '',
                'tipo_apoyo_taz' => isset($_POST['tipoApoyo']) ? implode(',', $_POST['tipoApoyo']) : '', // Manejar checkboxes
                'dificultad_ultimo_mes_taz' => $_POST['dificultadUltimoMes'] ?? '',
                'dificultad_ultimo_mes_cual_taz' => $_POST['dificultadUltimoMesCual'] ?? '',
                'ayuda_problema_taz' => $_POST['ayudaProblema'] ?? '',
                'ayuda_problema_otro_taz' => $_POST['ayudaProblemaOtro'] ?? '',
                'aprobacion_padres_taz' => $_POST['aprobacionPadres'] ?? '',
                'satisfaccion_titulacion_taz' => $_POST['satisfaccionTitulacion'] ?? '',
                'satisfaccion_titulacion_por_que_taz' => $_POST['satisfaccionTitulacionPorQue'] ?? '',
                'dificultad_adaptarse_taz' => $_POST['dificultadAdaptarse'] ?? '',
                'interrelacion_instructores_taz' => $_POST['interrelacionInstructores'] ?? '',
                'relacion_compañeros_taz' => $_POST['relacionCompañeros'] ?? '',
                'observaciones_taz' => $_POST['observaciones'] ?? '',
            ];

            // Llamar al método Tamizpsico con los datos correctos
            $result = $this->object->Tamizpsico($data);

            if ($result) {
                header("Location: ?b=psicol&message=Datos insertados correctamente");
                exit();
            } else {
                header("Location: ?b=psicol&message=Error al insertar los datos");
                exit();
            }
        }
    }

    public function buspsico()
    {
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/tamiz/tami-bus.css'>";
        $datos = [];

        if (isset($_POST['identificacion']) && !empty($_POST['identificacion'])) {
            $identificacion = $_POST['identificacion'];
            $datos[] = $this->object->buscarPorIdconsultaPsico($identificacion);
        } elseif (isset($_POST['jornada']) && !empty($_POST['jornada'])) {
            $jornada = $_POST['jornada'];
            $datos = $this->object->buscarPorJornadaPsico($jornada);
        } elseif (isset($_POST['ficha']) && !empty($_POST['ficha'])) {
            $ficha = $_POST['ficha'];
            $datos = $this->object->buscarPorFichaPsico($ficha);
        }

        if (!is_array($datos)) {
            $datos = [];
        }

        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/tamiz/bus/tami-buspsico.php";
        require_once "view/boostrap/footer.php";
    }


    public function exportarDatosPsico()
    {
        if (isset($_POST['datos_exportar'])) {
            $datos = json_decode($_POST['datos_exportar'], true);

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('todos los datos');

            $encabezados = [
                'Nombre', 'DNI', 'Numero de Ficha', 'Jornada', 'ID Tamiz', 'Nombre Tamiz', 'Sustancia psicoactiva', 'Cuáles Sustancia psicoactiva', 'Alcohol', 'Enfermedad Mental', 'Tristeza Último Mes', 'Por qué Tristeza', 'Con Quién Vive', 'Relación con Personas', 'Medio de Transporte', 'Otro Medio de Transporte', 'Origen de Ingresos', 'Otro Origen de Ingresos', 'Apoyo Familiar', 'Tipo de Apoyo', 'Dificultad Último Mes', 'Cuáles Dificultades', 'Ayuda en Problema', 'Otra Ayuda', 'Aprobación de Padres', 'Satisfacción con Titulación', 'Por qué Satisfacción', 'Dificultad de Adaptación', 'Relación con Instructores', 'Relación con Compañeros', 'Observaciones'
            ];

            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }

            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet->setCellValue([1, $rowIndex], isset($aprendiz['name_apre']) ? $aprendiz['name_apre'] : '');
                    $sheet->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet->setCellValue([3, $rowIndex], isset($aprendiz['numero_ficha_apre']) ? $aprendiz['numero_ficha_apre'] : '');
                    $sheet->setCellValue([4, $rowIndex], isset($aprendiz['jornada_apre']) ? $aprendiz['jornada_apre'] : '');
                    $sheet->setCellValue([5, $rowIndex], isset($tamiz['id_taz']) ? $tamiz['id_taz'] : '');
                    $sheet->setCellValue([6, $rowIndex], isset($tamiz['name_taz']) ? $tamiz['name_taz'] : '');
                    $sheet->setCellValue([7, $rowIndex], isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : '');
                    $sheet->setCellValue([8, $rowIndex], isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : '');
                    $sheet->setCellValue([9, $rowIndex], isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : '');
                    $sheet->setCellValue([10, $rowIndex], isset($tamiz['enfermedad_mental_taz']) ? $tamiz['enfermedad_mental_taz'] : '');
                    $sheet->setCellValue([11, $rowIndex], isset($tamiz['triste_ultimo_mes_taz']) ? $tamiz['triste_ultimo_mes_taz'] : '');
                    $sheet->setCellValue([12, $rowIndex], isset($tamiz['triste_ultimo_mes_por_que_taz']) ? $tamiz['triste_ultimo_mes_por_que_taz'] : '');
                    $sheet->setCellValue([13, $rowIndex], isset($tamiz['con_quien_vive_taz']) ? $tamiz['con_quien_vive_taz'] : '');
                    $sheet->setCellValue([14, $rowIndex], isset($tamiz['relacion_personas_taz']) ? $tamiz['relacion_personas_taz'] : '');
                    $sheet->setCellValue([15, $rowIndex], isset($tamiz['medio_transporte_taz']) ? $tamiz['medio_transporte_taz'] : '');
                    $sheet->setCellValue([16, $rowIndex], isset($tamiz['medio_transporte_otro_taz']) ? $tamiz['medio_transporte_otro_taz'] : '');
                    $sheet->setCellValue([17, $rowIndex], isset($tamiz['origen_ingresos_taz']) ? $tamiz['origen_ingresos_taz'] : '');
                    $sheet->setCellValue([18, $rowIndex], isset($tamiz['origen_ingresos_otro_taz']) ? $tamiz['origen_ingresos_otro_taz'] : '');
                    $sheet->setCellValue([19, $rowIndex], isset($tamiz['apoyo_familiar_taz']) ? $tamiz['apoyo_familiar_taz'] : '');
                    $sheet->setCellValue([20, $rowIndex], isset($tamiz['tipo_apoyo_taz']) ? $tamiz['tipo_apoyo_taz'] : '');
                    $sheet->setCellValue([21, $rowIndex], isset($tamiz['dificultad_ultimo_mes_taz']) ? $tamiz['dificultad_ultimo_mes_taz'] : '');
                    $sheet->setCellValue([22, $rowIndex], isset($tamiz['dificultad_ultimo_mes_cual_taz']) ? $tamiz['dificultad_ultimo_mes_cual_taz'] : '');
                    $sheet->setCellValue([23, $rowIndex], isset($tamiz['ayuda_problema_taz']) ? $tamiz['ayuda_problema_taz'] : '');
                    $sheet->setCellValue([24, $rowIndex], isset($tamiz['ayuda_problema_otro_taz']) ? $tamiz['ayuda_problema_otro_taz'] : '');
                    $sheet->setCellValue([25, $rowIndex], isset($tamiz['aprobacion_padres_taz']) ? $tamiz['aprobacion_padres_taz'] : '');
                    $sheet->setCellValue([26, $rowIndex], isset($tamiz['satisfaccion_titulacion_taz']) ? $tamiz['satisfaccion_titulacion_taz'] : '');
                    $sheet->setCellValue([27, $rowIndex], isset($tamiz['satisfaccion_titulacion_por_que_taz']) ? $tamiz['satisfaccion_titulacion_por_que_taz'] : '');
                    $sheet->setCellValue([28, $rowIndex], isset($tamiz['dificultad_adaptarse_taz']) ? $tamiz['dificultad_adaptarse_taz'] : '');
                    $sheet->setCellValue([29, $rowIndex], isset($tamiz['interrelacion_instructores_taz']) ? $tamiz['interrelacion_instructores_taz'] : '');
                    $sheet->setCellValue([30, $rowIndex], isset($tamiz['relacion_compañeros_taz']) ? $tamiz['relacion_compañeros_taz'] : '');
                    $sheet->setCellValue([31, $rowIndex], isset($tamiz['observaciones_taz']) ? $tamiz['observaciones_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'A1:AE' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table1');
            $sheet->addTable($table);

            // Hoja secundaria 
            $sheet2 = $spreadsheet->createSheet();
            $sheet2->setTitle('Sustancia psicoactiva');

            $encabezados = [
                ' ', 'DNI', 'Sustancia psicoactiva', 'Cuáles Sustancia psicoactiva'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet2->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet2->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet2->setCellValue([3, $rowIndex], isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : '');
                    $sheet2->setCellValue([4, $rowIndex], isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table2');
            $sheet2->addTable($table);

            // Hoja secundaria 
            $sheet3 = $spreadsheet->createSheet();
            $sheet3->setTitle('Alcohol');
            $encabezados = [
                ' ', 'DNI', 'Alcohol'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet3->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet3->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet3->setCellValue([3, $rowIndex], isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table3');
            $sheet3->addTable($table);

            // Hoja secundaria 
            $sheet4 = $spreadsheet->createSheet();
            $sheet4->setTitle('Enfermedad Mental');
            $encabezados = [
                ' ', 'DNI', 'Enfermedad Mental'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet4->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet4->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet4->setCellValue([3, $rowIndex],  isset($tamiz['enfermedad_mental_taz']) ? $tamiz['enfermedad_mental_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table4');
            $sheet4->addTable($table);

            // Hoja secundaria 
            $sheet5 = $spreadsheet->createSheet();
            $sheet5->setTitle('Tristeza Último Mes');
            $encabezados = [
                ' ', 'DNI', 'Tristeza Último Mes', 'Por qué Tristeza'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet5->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet5->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet5->setCellValue([3, $rowIndex],  isset($tamiz['triste_ultimo_mes_taz']) ? $tamiz['triste_ultimo_mes_taz'] : '');
                    $sheet5->setCellValue([4, $rowIndex], isset($tamiz['triste_ultimo_mes_por_que_taz']) ? $tamiz['triste_ultimo_mes_por_que_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table5');
            $sheet5->addTable($table);
            // Hoja secundaria 
            $sheet6 = $spreadsheet->createSheet();
            $sheet6->setTitle('Sustancias Psicoactivas');
            $encabezados = [
                ' ', 'DNI', 'Con Quién Vive'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet6->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet6->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet6->setCellValue([3, $rowIndex], isset($tamiz['con_quien_vive_taz']) ? $tamiz['con_quien_vive_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table6');
            $sheet6->addTable($table);
            // Hoja secundaria 
            $sheet7 = $spreadsheet->createSheet();
            $sheet7->setTitle('Relación con Personas');
            $encabezados = [
                ' ', 'DNI', 'Relación con Personas'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet7->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet7->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet7->setCellValue([3, $rowIndex],  isset($tamiz['relacion_personas_taz']) ? $tamiz['relacion_personas_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table7');
            $sheet7->addTable($table);
            // Hoja secundaria 
            $sheet8 = $spreadsheet->createSheet();
            $sheet8->setTitle('Medio de Transporte');
            $encabezados = [
                ' ', 'DNI', 'Medio de Transporte', 'Otro Medio de Transporte'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet8->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet8->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet8->setCellValue([3, $rowIndex],  isset($tamiz['medio_transporte_taz']) ? $tamiz['medio_transporte_taz'] : '');
                    $sheet8->setCellValue([4, $rowIndex],  isset($tamiz['medio_transporte_otro_taz']) ? $tamiz['medio_transporte_otro_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table8');
            $sheet8->addTable($table);
            // Hoja secundaria 
            $sheet9 = $spreadsheet->createSheet();
            $sheet9->setTitle('Origen de Ingresos');
            $encabezados = [
                ' ', 'DNI', 'Origen de Ingresos', 'Otro Origen de Ingresos'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet9->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet9->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet9->setCellValue([3, $rowIndex], isset($tamiz['origen_ingresos_taz']) ? $tamiz['origen_ingresos_taz'] : '');
                    $sheet9->setCellValue([4, $rowIndex], isset($tamiz['origen_ingresos_otro_taz']) ? $tamiz['origen_ingresos_otro_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table9');
            $sheet9->addTable($table);
            // Hoja secundaria 
            $sheet10 = $spreadsheet->createSheet();
            $sheet10->setTitle('Apoyo Familiar');
            $encabezados = [
                ' ', 'DNI', 'Apoyo Familiar', 'Tipo de Apoyo'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet10->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet10->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet10->setCellValue([3, $rowIndex], isset($tamiz['apoyo_familiar_taz']) ? $tamiz['apoyo_familiar_taz'] : '');
                    $sheet10->setCellValue([3, $rowIndex], isset($tamiz['tipo_apoyo_taz']) ? $tamiz['tipo_apoyo_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table10');
            $sheet10->addTable($table);
            // Hoja secundaria 
            $sheet11 = $spreadsheet->createSheet();
            $sheet11->setTitle('Dificultad Último Mes');
            $encabezados = [
                ' ', 'DNI', 'Dificultad Último Mes', 'Cuáles Dificultades'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet11->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet11->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet11->setCellValue([3, $rowIndex], isset($tamiz['dificultad_ultimo_mes_taz']) ? $tamiz['dificultad_ultimo_mes_taz'] : '');
                    $sheet11->setCellValue([3, $rowIndex], isset($tamiz['dificultad_ultimo_mes_cual_taz']) ? $tamiz['dificultad_ultimo_mes_cual_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table11');
            $sheet11->addTable($table);
            // Hoja secundaria 
            $sheet12 = $spreadsheet->createSheet();
            $sheet12->setTitle('Ayuda en Problema');
            $encabezados = [
                ' ', 'DNI', 'Ayuda en Problema', 'Otra Ayuda'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet12->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet12->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet12->setCellValue([3, $rowIndex], isset($tamiz['ayuda_problema_taz']) ? $tamiz['ayuda_problema_taz'] : '');
                    $sheet12->setCellValue([3, $rowIndex], isset($tamiz['ayuda_problema_otro_taz']) ? $tamiz['ayuda_problema_otro_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table12');
            $sheet12->addTable($table);
            // Hoja secundaria 
            $sheet13 = $spreadsheet->createSheet();
            $sheet13->setTitle('Aprobación de Padres');
            $encabezados = [
                ' ', 'DNI', 'Aprobación de Padres'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet13->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet13->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet13->setCellValue([3, $rowIndex], isset($tamiz['aprobacion_padres_taz']) ? $tamiz['aprobacion_padres_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table13');
            $sheet13->addTable($table);
            // Hoja secundaria 
            $sheet14 = $spreadsheet->createSheet();
            $sheet14->setTitle('Satisfacción con Titulación');
            $encabezados = [
                ' ', 'DNI', 'Satisfacción con Titulación', 'Por qué Satisfacción'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet14->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet14->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet14->setCellValue([3, $rowIndex], isset($tamiz['satisfaccion_titulacion_taz']) ? $tamiz['satisfaccion_titulacion_taz'] : '');
                    $sheet14->setCellValue([4, $rowIndex], isset($tamiz['satisfaccion_titulacion_por_que_taz']) ? $tamiz['satisfaccion_titulacion_por_que_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:D' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table14');
            $sheet14->addTable($table);
            // Hoja secundaria 
            $sheet15 = $spreadsheet->createSheet();
            $sheet15->setTitle('Dificultad de Adaptación');
            $encabezados = [
                ' ', 'DNI', 'Dificultad de Adaptación'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet15->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet15->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet15->setCellValue([3, $rowIndex], isset($tamiz['dificultad_adaptarse_taz']) ? $tamiz['dificultad_adaptarse_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table15');
            $sheet15->addTable($table);
            // Hoja secundaria 
            $sheet16 = $spreadsheet->createSheet();
            $sheet16->setTitle('Relación con Instructores');
            $encabezados = [
                ' ', 'DNI', 'Relación con Instructores'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet16->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet16->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet16->setCellValue([3, $rowIndex], isset($tamiz['interrelacion_instructores_taz']) ? $tamiz['interrelacion_instructores_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table16');
            $sheet16->addTable($table);
            // Hoja secundaria 
            $sheet17 = $spreadsheet->createSheet();
            $sheet17->setTitle('Relación con Compañeros');
            $encabezados = [
                ' ', 'DNI', 'Relación con Compañeros'
            ];
            $columnIndex = 1;
            foreach ($encabezados as $encabezado) {
                $sheet17->setCellValue([$columnIndex, 1], $encabezado);
                $columnIndex++;
            }
            $rowIndex = 2;
            foreach ($datos as $aprendiz) {
                foreach ($aprendiz['tamiz_psico'] as $tamiz) {
                    $sheet17->setCellValue([2, $rowIndex], isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : '');
                    $sheet17->setCellValue([3, $rowIndex], isset($tamiz['relacion_compañeros_taz']) ? $tamiz['relacion_compañeros_taz'] : '');
                    $rowIndex++;
                }
            }
            $tableRange = 'B1:C' . ($rowIndex - 1);
            $table = new \PhpOffice\PhpSpreadsheet\Worksheet\Table($tableRange);
            $table->setName('Table17');
            $sheet17->addTable($table);


            $fechaActual = (new DateTime())->format('Y-m-d');
            $nombreArchivo = "Tamizaje_Psicosocial_$fechaActual.xlsx";
            $writer = new Xlsx($spreadsheet);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header("Content-Disposition: attachment; filename=\"$nombreArchivo\"");
            header('Cache-Control: max-age=0');

            $writer->save('php://output');
            exit;
        } else {
            header('Location: ?b=Tamiz');
            exit;
        }
    }
}
