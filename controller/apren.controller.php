<?php

include_once "model/apren.php";

class AprenController
{
    private $object;

    public function __construct()
    {
        $this->object = new apren();
    }

    public function Inicio()
    {
        if (!isset($_SESSION['usuario'])) {
            $mensaje = "Debe iniciar sesión para acceder a esta página";
            header("Location: ?b=login&mensaje=" . urlencode($mensaje));
            exit();
        }
        $usuario = $_SESSION['usuario'];
        $user = $this->object->selectUser($usuario);

        $_SESSION['name'] = $user['name_del'];
        
        $apren_model = new Apren();
        $aprendices = $apren_model->obtenerAprendices();

        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/aprendiz/aprendiz.css'>";
        
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/aprendiz/aprendiz.php";
        require_once "view/boostrap/footer.php";

        // Verificar la sesión antes de cargar cualquier controlador o acción
        verificarSesion();
    }

    public function sessionexit()
    {

        if (isset($_GET['s']) && $_GET['s'] === 'sessionexit') {

            echo '<script>alert("Sesión cerrada exitosamente");</script>';

            $_SESSION = array();
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            session_destroy();
            header("Location: ?b=index");
            exit();
        }
    }

    public function add(){
        $style = "<link rel='stylesheet' href='assets/css/static/boostrap/header_footer.css'>
        <link rel='stylesheet' href='assets/css/aprendiz/add.css'>";
        require_once "view/boostrap/head.php";
        require_once "view/boostrap/heder_user.php";
        require_once "view/aprendiz/add.php";
        require_once "view/boostrap/footer.php";
    }

    public function guardarAprendiz()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $selected_values_ser_publi =  isset($_POST['ser_publico']) ? $_POST['ser_publico'] : '';
            $selected_values_temp_lib = isset($_POST['tiempoLibre']) ? $_POST['tiempoLibre'] : '';
            $selected_values_limita = isset($_POST['limitaciones']) ? $_POST['limitaciones'] : '';
            $selected_values_ante_famili = isset($_POST['antecedentes-familia']) ? $_POST['antecedentes-familia'] : '';
            

            // Obtener y validar datos del formulario
            $datos_aprendiz = array(
                'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : '',
                'apellidos' => isset($_POST['apellidos']) ? $_POST['apellidos'] : '',
                'tipo_documento' => isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : '',
                'dni' => isset($_POST['numeroDocumento']) ? $_POST['numeroDocumento'] : '',
                'edad' => isset($_POST['edad']) ? $_POST['edad'] : '',
                'estado_civil' => isset($_POST['estadoCivil']) ? $_POST['estadoCivil'] : '',
                'sexo' => isset($_POST['sexo']) ? $_POST['sexo'] : '',
                'identificacion_genero' => isset($_POST['identidadGenero']) ? $_POST['identidadGenero'] : '',
                'grupo_etnico' => isset($_POST['grupoEtnico']) ? $_POST['grupoEtnico'] : '',
                'grupo_etnico_cual' => isset($_POST['grupoEtnicoCual']) ? $_POST['grupoEtnicoCual'] : '',
                'estrato' => isset($_POST['estrato']) ? $_POST['estrato'] : '',
                'zona_residencia' => isset($_POST['zonaResidencia']) ? $_POST['zonaResidencia'] : '',
                'lugar_residencia' => isset($_POST['lugarResidencia']) ? $_POST['lugarResidencia'] : '',
                'servicios_publicos' => implode(",", $selected_values_ser_publi),
                'tiempo_libre' => implode(",", $selected_values_temp_lib),
                'vivienda' => isset($_POST['vivienda']) ? $_POST['vivienda'] : '',
                'hijos' => isset($_POST['hijos']) ? $_POST['hijos'] : '',
                'embarazo' => isset($_POST['embarazo']) ? $_POST['embarazo'] : '',
                'control_prenatal' => isset($_POST['controlesPrenatales']) ? $_POST['controlesPrenatales'] : '',
                'diagnostico_medico' => isset($_POST['diagnosticoMedico']) ? $_POST['diagnosticoMedico'] : '',
                'diagnostico_medico_cual' => isset($_POST['diagnosticoMedicoCual']) ? $_POST['diagnosticoMedicoCual'] : '',
                'medicacion' => isset($_POST['medicamento']) ? $_POST['medicamento'] : '',
                'medicacion_cual' => isset($_POST['medicamentoCual']) ? $_POST['medicamentoCual'] : '',
                'limitaciones' => implode(",", $selected_values_limita),
                'antecedentes_familiares' => implode(",", $selected_values_ante_famili),
                'antecedentes_familiares_otro' => isset($_POST['antecedentesFamiliaOtra']) ? $_POST['antecedentesFamiliaOtra'] : '',
                'numero_celular' => isset($_POST['numeroCelular']) ? $_POST['numeroCelular'] : '',
                'correo' => isset($_POST['correo']) ? $_POST['correo'] : '',
                'numero_ficha' => isset($_POST['numeroFicha']) ? $_POST['numeroFicha'] : '',
                'jornada' => isset($_POST['jornada']) ? $_POST['jornada'] : '',
                'contacto_emergencia' => isset($_POST['contactoEmergencia']) ? $_POST['contactoEmergencia'] : '',
                'numero_contacto_emergencia' => isset($_POST['numeroContactoEmergencia']) ? $_POST['numeroContactoEmergencia'] : ''
            );

            // Insertar el aprendiz en la base de datos
            $apren_model = new Apren(); // Instancia de la clase Apren
            try {
                $resultado = $apren_model->insertarAprendiz($datos_aprendiz);
    
                if ($resultado) {
                    // Éxito en la inserción
                    echo "<script>
                            alert('Los datos del aprendiz fueron almacenados correctamente.');
                            window.location.href = '?b=apren';
                          </script>";
                } else {
                    // Error al insertar
                    echo "<script>
                            alert('Hubo un problema al almacenar los datos del aprendiz.');
                            window.location.href = '?b=apren&s=add';
                          </script>";
                }
            } catch (Exception $e) {
                // Captura de excepciones y manejo de errores
                echo "<script>
                        alert('Error: " . $e->getMessage() . "');
                        window.location.href = '?b=apren&s=add';
                      </script>";
            }
        }
    }
}
