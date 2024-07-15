<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tamizaje</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2619cec24c.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .section-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin: 20px 0 10px;
            border-radius: 5px;
            text-align: center;
        }

        .form-group {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .form-group:last-of-type {
            border-bottom: none;
        }

        .btn-actualizar {
            margin-top: 20px;
            width: 100%;
        }

        .modal-fullscreen {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            overflow: auto;
            z-index: 1050;
        }

        .modal-content-fullscreen {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
        }

        .modal-footer-fullscreen {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row aling-items-center">
            <div class="col-6 col-md-4">
                <a href="?b=enfermeria"><i class="fas fa-circle-chevron-left"></i></a>
            </div>
        </div>
        <h1 class="text-center">Formulario de Tamizaje de Psicosocial</h1>
        <form method="POST" action="?b=tamiz&s=buscarPorIdentificacioPsico">
            <div class="form-group">
                <label for="buscar">Buscar aprendiz por número de identificación:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="buscar" name="identificacion" placeholder="Ingrese número de identificación" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                    </div>
                </div>
            </div>
        </form>

        <?php if (isset($usuario)) : ?>
            <form method="POST" action="?b=tamiz&s=guarTamizEnfe">
                <div class="form-group">
                    <label for="nombre">1. Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidos">2. Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento">3. Tipo de Documento</label>
                    <select class="form-control" id="tipoDocumento" name="tipo_documento" disabled>
                        <option value="">Seleccione</option>
                        <option value="CC" <?php echo $usuario['tipo_documento'] == 'CC' ? 'selected' : ''; ?>>Cédula de Ciudadanía</option>
                        <option value="TI" <?php echo $usuario['tipo_documento'] == 'TI' ? 'selected' : ''; ?>>Tarjeta de Identidad</option>
                        <option value="CE" <?php echo $usuario['tipo_documento'] == 'CE' ? 'selected' : ''; ?>>Cédula de Extranjería</option>
                        <option value="PASAPORTE" <?php echo $usuario['tipo_documento'] == 'PASAPORTE' ? 'selected' : ''; ?>>Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numeroDocumento">4. Número de Documento</label>
                    <input type="text" class="form-control" id="numeroDocumento" name="numero_documento" value="<?php echo htmlspecialchars($usuario['numero_documento']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="edad">5. Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" readonly>
                </div>

                <input type="hidden" name="id_apre" value="<?php echo $usuario['id_apre']; ?>">

                <button type="button" class="btn btn-primary btn-actualizar" id="actualizarBtn">Actualizar Información</button>
                <button type="button" class="btn btn-primary btn-actualizar" id="siguienteBtn">Siguiente</button>
            </form>
        <?php endif; ?>
    </div>

    <div class="modal-fullscreen" id="fullscreenModal">
        <div class="modal-content-fullscreen">
            <form id="formularioAdicional" method="POST" action="?b=tamiz&s=guarTamizPsico">
                <input type="hidden" name="id_apre" value="<?php echo isset($usuario['id_apre']) ? $usuario['id_apre'] : ''; ?>">
                <div class="form-group">
                    <label for="name_taz">Nombre del Tamizaje</label>
                    <input type="text" class="form-control" id="name_taz" name="name_taz" required>
                </div>
                <div class="form-group">
                    <label for="sustanciasPsicoactivas">¿Consume sustancias psicoactivas?</label>
                    <select class="form-control" id="sustanciasPsicoactivas" name="sustanciasPsicoactivas" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sustanciasPsicoactivasCual">Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="sustanciasPsicoactivasCual" name="sustanciasPsicoactivasCual">
                </div>
                <div class="form-group">
                    <label for="bebidasAlcoholicas">¿Consume bebidas alcohólicas?</label>
                    <select class="form-control" id="bebidasAlcoholicas" name="bebidasAlcoholicas" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                        <option value="EN OCASIONES">En ocasiones</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoEnfermedadMental">¿Has sido diagnosticado(a) con alguna enfermedad mental?</label>
                    <select class="form-control" id="diagnosticoEnfermedadMental" name="diagnosticoEnfermedadMental" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tristeUltimoMes">¿Se ha sentido triste el último mes?</label>
                    <select class="form-control" id="tristeUltimoMes" name="tristeUltimoMes" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tristeUltimoMesPorQue">Si su respuesta fue "sí", escriba ¿por qué?</label>
                    <input type="text" class="form-control" id="tristeUltimoMesPorQue" name="tristeUltimoMesPorQue">
                </div>
                <div class="form-group">
                    <label for="conQuienVive">¿Con quién vive?</label>
                    <select class="form-control" id="conQuienVive" name="conQuienVive" required>
                        <option value="">Seleccione</option>
                        <option value="FAMILIA NUCLEARES">Familia nuclear</option>
                        <option value="FAMILIA EXTENSOS">Familia extensa</option>
                        <option value="FAMILIA COMPUESTA">Familia compuesta</option>
                        <option value="FAMILIARES SIN NÚCLEO">Familiares sin núcleo</option>
                        <option value="HOGARES NO FAMILIARES SIN NÚCLEO">Hogares no familiares sin núcleo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="relacionPersonas">Si vive con alguien, ¿cómo es la relación con las personas que vive?</label>
                    <select class="form-control" id="relacionPersonas" name="relacionPersonas" required>
                        <option value="">Seleccione</option>
                        <option value="BUENA">Buena</option>
                        <option value="MALA">Mala</option>
                        <option value="REGULAR">Regular</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medioTransporte">El medio de transporte que usa para movilizarse es:</label>
                    <select class="form-control" id="medioTransporte" name="medioTransporte" required>
                        <option value="">Seleccione</option>
                        <option value="MOTOCICLETA">Motocicleta</option>
                        <option value="BICICLETA">Bicicleta</option>
                        <option value="CAMINANDO">Caminando</option>
                        <option value="SERVICIO PUBLICO">Servicio público</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medioTransporteOtro">Si su anterior respuesta fue "otro", escriba cuál</label>
                    <input type="text" class="form-control" id="medioTransporteOtro" name="medioTransporteOtro">
                </div>
                <div class="form-group">
                    <label for="origenIngresos">¿Cuál es el origen de sus ingresos?</label>
                    <select class="form-control" id="origenIngresos" name="origenIngresos" required>
                        <option value="">Seleccione</option>
                        <option value="PADRES">Padres</option>
                        <option value="TRABAJO">Trabajo</option>
                        <option value="PROGRAMAS DEL ESTADO">Programas del Estado</option>
                        <option value="NINGUNO">Ninguno</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="origenIngresosOtro">Si su anterior respuesta fue "otro", diga cuál</label>
                    <input type="text" class="form-control" id="origenIngresosOtro" name="origenIngresosOtro">
                </div>
                <div class="form-group">
                    <label for="apoyoFamiliar">¿Cuenta con apoyo familiar?</label>
                    <select class="form-control" id="apoyoFamiliar" name="apoyoFamiliar" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Si su respuesta fue "sí" ¿qué tipo de apoyo recibe?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tipoApoyo1" name="tipoApoyo[]" value="ECONOMICO">
                        <label class="form-check-label" for="tipoApoyo1">
                            Económico
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tipoApoyo2" name="tipoApoyo[]" value="EMOCIONAL">
                        <label class="form-check-label" for="tipoApoyo2">
                            Emocional
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tipoApoyo3" name="tipoApoyo[]" value="ACADEMICO">
                        <label class="form-check-label" for="tipoApoyo3">
                            Académico
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tipoApoyo4" name="tipoApoyo[]" value="NINGUNO">
                        <label class="form-check-label" for="tipoApoyo4">
                            Ninguno
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dificultadUltimoMes">¿Ha presentado alguna dificultad el último mes?</label>
                    <select class="form-control" id="dificultadUltimoMes" name="dificultadUltimoMes" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dificultadUltimoMesCual">En caso de marcar "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="dificultadUltimoMesCual" name="dificultadUltimoMesCual">
                </div>
                <div class="form-group">
                    <label for="ayudaProblema">Cuando tiene un problema ¿a quién pide ayuda?</label>
                    <select class="form-control" id="ayudaProblema" name="ayudaProblema" required>
                        <option value="">Seleccione</option>
                        <option value="PADRES">Padres</option>
                        <option value="ALGUN FAMILIAR">Algún familiar</option>
                        <option value="AMIGO O AMIGA">Amigo o amiga</option>
                        <option value="PAREJA">Pareja</option>
                        <option value="NADIE">Nadie</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ayudaProblemaOtro">Si su anterior respuesta fue "otro", diga cuál</label>
                    <input type="text" class="form-control" id="ayudaProblemaOtro" name="ayudaProblemaOtro">
                </div>
                <div class="form-group">
                    <label for="aprobacionPadres">Antes de tomar una decisión ¿pide la aprobación de sus padres?</label>
                    <select class="form-control" id="aprobacionPadres" name="aprobacionPadres" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="satisfaccionTitulacion">¿Se siente satisfecho con la titulación que actualmente cursa?</label>
                    <select class="form-control" id="satisfaccionTitulacion" name="satisfaccionTitulacion" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="satisfaccionTitulacionPorQue">Si su anterior respuesta es "no", escriba por qué</label>
                    <input type="text" class="form-control" id="satisfaccionTitulacionPorQue" name="satisfaccionTitulacionPorQue">
                </div>
                <div class="form-group">
                    <label for="dificultadAdaptarse">¿Siente dificultad para adaptarse a las diferentes metodologías de los instructores?</label>
                    <select class="form-control" id="dificultadAdaptarse" name="dificultadAdaptarse" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="interrelacionInstructores">¿Cómo es la interrelación con sus instructores?</label>
                    <select class="form-control" id="interrelacionInstructores" name="interrelacionInstructores" required>
                        <option value="">Seleccione</option>
                        <option value="BUENA">Buena</option>
                        <option value="MALA">Mala</option>
                        <option value="REGULAR">Regular</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="relacionCompañeros">¿Cómo es la relación interpersonal con sus compañeros?</label>
                    <select class="form-control" id="relacionCompañeros" name="relacionCompañeros" required>
                        <option value="">Seleccione</option>
                        <option value="BUENA">Buena</option>
                        <option value="MALA">Mala</option>
                        <option value="REGULAR">Regular</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>
                <div class="modal-footer-fullscreen">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="?b=tamiz&s=psico" class="btn btn-secondary" id="devolverBtn">Devolver</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#actualizarBtn').click(function() {
                window.location.href = "?b=tamiz&s=actualizarDatosUsuario&identificacion=" + $('#buscar').val();
            });

            $('#siguienteBtn').click(function() {
                $('#fullscreenModal').show();
            });
        });


        function validateTemperature(input) {
            const value = input.value;
            const regex = /^\d+(\.\d{1,2})?$/;

            if (!regex.test(value)) {
                input.setCustomValidity('Por favor, ingrese un número decimal válido (e.g., 35.5).');
            } else {
                input.setCustomValidity('');
            }
        }
    </script>
</body>

</html>


















<!-- <div class="form-group">
    <label for="sustanciasPsicoactivas">¿Consume sustancias psicoactivas?</label>
    <select class="form-control" id="sustanciasPsicoactivas" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="sustanciasPsicoactivasCual">Si su anterior respuesta fue "sí", escriba cuál</label>
    <input type="text" class="form-control" id="sustanciasPsicoactivasCual">
</div>
<div class="form-group">
    <label for="bebidasAlcoholicas">¿Consume bebidas alcohólicas?</label>
    <select class="form-control" id="bebidasAlcoholicas" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
        <option value="EN OCASIONES">En ocasiones</option>
    </select>
</div>

<div class="form-group">
    <label for="diagnosticoEnfermedadMental">¿Has sido diagnosticado(a) con alguna enfermedad mental?</label>
    <select class="form-control" id="diagnosticoEnfermedadMental" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="tristeUltimoMes">¿Se ha sentido triste el último mes?</label>
    <select class="form-control" id="tristeUltimoMes" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="tristeUltimoMesPorQue">Si su respuesta fue "sí", escriba ¿por qué?</label>
    <input type="text" class="form-control" id="tristeUltimoMesPorQue">
</div>
<div class="form-group">
    <label for="conQuienVive">¿Con quién vive?</label>
    <select class="form-control" id="conQuienVive" required>
        <option value="">Seleccione</option>
        <option value="FAMILIA NUCLEARES">Familia nuclear</option>
        <option value="FAMILIA EXTENSOS">Familia extensa</option>
        <option value="FAMILIA COMPUESTA">Familia compuesta</option>
        <option value="FAMILIARES SIN NÚCLEO">Familiares sin núcleo</option>
        <option value="HOGARES NO FAMILIARES SIN NÚCLEO">Hogares no familiares sin núcleo</option>
    </select>
</div>
<div class="form-group">
    <label for="relacionPersonas">Si vive con alguien, ¿cómo es la relación con las personas que vive?</label>
    <select class="form-control" id="relacionPersonas" required>
        <option value="">Seleccione</option>
        <option value="BUENA">Buena</option>
        <option value="MALA">Mala</option>
        <option value="REGULAR">Regular</option>
    </select>
</div>
<div class="form-group">
    <label for="medioTransporte">El medio de transporte que usa para movilizarse es:</label>
    <select class="form-control" id="medioTransporte" required>
        <option value="">Seleccione</option>
        <option value="MOTOCICLETA">Motocicleta</option>
        <option value="BICICLETA">Bicicleta</option>
        <option value="CAMINANDO">Caminando</option>
        <option value="SERVICIO PUBLICO">Servicio público</option>
        <option value="OTRO">Otro</option>
    </select>
</div>
<div class="form-group">
    <label for="medioTransporteOtro">Si su anterior respuesta fue "otro", escriba cuál</label>
    <input type="text" class="form-control" id="medioTransporteOtro">
</div>
<div class="form-group">
    <label for="origenIngresos">¿Cuál es el origen de sus ingresos?</label>
    <select class="form-control" id="origenIngresos" required>
        <option value="">Seleccione</option>
        <option value="PADRES">Padres</option>
        <option value="TRABAJO">Trabajo</option>
        <option value="PROGRAMAS DEL ESTADO">Programas del Estado</option>
        <option value="NINGUNO">Ninguno</option>
        <option value="OTRO">Otro</option>
    </select>
</div>
<div class="form-group">
    <label for="origenIngresosOtro">Si su anterior respuesta fue "otro", diga cuál</label>
    <input type="text" class="form-control" id="origenIngresosOtro">
</div>
<div class="form-group">
    <label for="apoyoFamiliar">¿Cuenta con apoyo familiar?</label>
    <select class="form-control" id="apoyoFamiliar" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label>Si su respuesta fue "sí" ¿qué tipo de apoyo recibe?</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoApoyo1" value="ECONOMICO">
        <label class="form-check-label" for="tipoApoyo1">
            Económico
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoApoyo2" value="EMOCIONAL">
        <label class="form-check-label" for="tipoApoyo2">
            Emocional
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoApoyo3" value="ACADEMICO">
        <label class="form-check-label" for="tipoApoyo3">
            Académico
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="tipoApoyo4" value="NINGUNO">
        <label class="form-check-label" for="tipoApoyo4">
            Ninguno
        </label>
    </div>
</div>
<div class="form-group">
    <label for="dificultadUltimoMes">¿Ha presentado alguna dificultad el último mes?</label>
    <select class="form-control" id="dificultadUltimoMes" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="dificultadUltimoMesCual">En caso de marcar "sí", escriba cuál</label>
    <input type="text" class="form-control" id="dificultadUltimoMesCual">
</div>
<div class="form-group">
    <label for="ayudaProblema">Cuando tiene un problema ¿a quién pide ayuda?</label>
    <select class="form-control" id="ayudaProblema" required>
        <option value="">Seleccione</option>
        <option value="PADRES">Padres</option>
        <option value="ALGUN FAMILIAR">Algún familiar</option>
        <option value="AMIGO O AMIGA">Amigo o amiga</option>
        <option value="PAREJA">Pareja</option>
        <option value="NADIE">Nadie</option>
        <option value="OTRO">Otro</option>
    </select>
</div>
<div class="form-group">
    <label for="ayudaProblemaOtro">Si su anterior respuesta fue "otro", diga cuál</label>
    <input type="text" class="form-control" id="ayudaProblemaOtro">
</div>
<div class="form-group">
    <label for="aprobacionPadres">Antes de tomar una decisión ¿pide la aprobación de sus padres?</label>
    <select class="form-control" id="aprobacionPadres" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="satisfaccionTitulacion">¿Se siente satisfecho con la titulación que actualmente cursa?</label>
    <select class="form-control" id="satisfaccionTitulacion" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="satisfaccionTitulacionPorQue">Si su anterior respuesta es "no", escriba por qué</label>
    <input type="text" class="form-control" id="satisfaccionTitulacionPorQue">
</div>
<div class="form-group">
    <label for="dificultadAdaptarse">¿Siente dificultad para adaptarse a las diferentes metodologías de los instructores?</label>
    <select class="form-control" id="dificultadAdaptarse" required>
        <option value="">Seleccione</option>
        <option value="SI">Sí</option>
        <option value="NO">No</option>
    </select>
</div>
<div class="form-group">
    <label for="interrelacionInstructores">¿Cómo es la interrelación con sus instructores?</label>
    <select class="form-control" id="interrelacionInstructores" required>
        <option value="">Seleccione</option>
        <option value="BUENA">Buena</option>
        <option value="MALA">Mala</option>
        <option value="REGULAR">Regular</option>
    </select>
</div>
<div class="form-group">
    <label for="relacionCompañeros">¿Cómo es la relación interpersonal con sus compañeros?</label>
    <select class="form-control" id="relacionCompañeros" required>
        <option value="">Seleccione</option>
        <option value="BUENA">Buena</option>
        <option value="MALA">Mala</option>
        <option value="REGULAR">Regular</option>
    </select>
    <div class="form-group">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" id="observaciones" rows="3"></textarea>
    </div> -->