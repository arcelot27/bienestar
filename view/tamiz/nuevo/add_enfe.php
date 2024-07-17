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
        <h1 class="text-center">Formulario de Tamizaje de salud</h1>
        <form method="POST" action="?b=tamiz&s=buscarPorIdentificacionenfe">
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
            <form id="formularioAdicional" method="POST" action="?b=tamiz&s=guarTamizEnfe">
                <input type="hidden" name="id_apre" value="<?php echo isset($usuario['id_apre']) ? $usuario['id_apre'] : ''; ?>">
                <div class="form-group">
                    <label for="name_taz">Nombre del Tamizaje</label>
                    <input type="text" class="form-control" id="name_taz" name="name_taz" required>
                </div>
                <div class="form-group">
                    <label for="ult_examen_fisico_taz">¿Cuándo tuvo su último examen físico?</label>
                    <select class="form-control" id="ult_examen_fisico" name="ult_examen_fisico_taz" required>
                        <option value="">Seleccione</option>
                        <option value="HACE MENOS DE UN MES">Hace menos de un mes</option>
                        <option value="UN MES A TRES MESES">Un mes a tres meses</option>
                        <option value="CUATRO A SEIS MESES">Cuatro a seis meses</option>
                        <option value="SIETE A NUEVE MESES">Siete a nueve meses</option>
                        <option value="DIEZ A DOCE MESES">Diez a doce meses</option>
                        <option value="HACE MAS DE UN AÑO">Hace más de un año</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cirugia">¿Le han practicado alguna cirugía?</label>
                    <select class="form-control" id="cirugia" name="cirugia_taz" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cirugiaCual">Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="cirugiaCual" name="cirugia_cual_taz">
                </div>
                <div class="form-group">
                    <label for="sintomasInusuales">¿Hay algún síntoma inusual que haya notado recientemente?</label>
                    <select class="form-control" id="sintomasInusuales" name="sintomas_inusuales_taz" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sintomasInusualesCual">Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="sintomasInusualesCual" name="sintomas_inusuales_cual_taz">
                </div>
                <div class="form-group">
                    <label for="convulsiones">¿Ha tenido convulsiones o pérdida del conocimiento?</label>
                    <select class="form-control" id="convulsiones" name="convulsiones_taz" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sustanciasPsicoactivas">¿Consume sustancias psicoactivas?</label>
                    <select class="form-control" id="sustanciasPsicoactivas" name="sustancias_psicoactivas_taz" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sustanciasPsicoactivasCual">Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="sustanciasPsicoactivasCual" name="sustancias_psicoactivas_cual_taz">
                </div>
                <div class="form-group">
                    <label for="bebidasAlcoholicas">¿Consume bebidas alcohólicas?</label>
                    <select class="form-control" id="bebidasAlcoholicas" name="bebidas_alcoholicas_taz" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                        <option value="EN OCASIONES">En ocasiones</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="presionArterial">Presión Arterial</label>
                    <input type="number" class="form-control" id="presionArterial" name="presion_arterial_taz" required>
                </div>
                <div class="form-group">
                    <label for="frecuenciaCardiaca">Frecuencia Cardíaca (latidos * minuto)</label>
                    <input type="number" class="form-control" id="frecuenciaCardiaca" name="frecuencia_cardiaca_taz" required>
                </div>
                <div class="form-group">
                    <label for="frecuenciaRespiratoria">Frecuencia Respiratoria</label>
                    <input type="number" class="form-control" id="frecuenciaRespiratoria" name="frecuencia_respiratoria_taz" required>
                </div>
                <div class="form-group">
                    <label for="saturacion">Saturación (%)</label>
                    <input type="number" class="form-control" id="saturacion" name="saturacion_taz" required>
                </div>
                <div class="form-group">
                    <label for="temperatura">Temperatura (°C / 35.5)</label>
                    <input type="number" class="form-control" id="temperatura" name="temperatura_taz" step="0.1" pattern="\d+(\.\d{1,2})?" required oninput="validateTemperature(this)">
                </div>
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso_taz" required>
                </div>
                <div class="form-group">
                    <label for="talla">Talla</label>
                    <input type="text" class="form-control" id="talla" name="talla_taz" required>
                </div>
                <div class="form-group">
                    <label for="observaciones">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones_taz" rows="3"></textarea>
                </div>
                <div class="modal-footer-fullscreen">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="?b=tamiz&s=enfe" class="btn btn-secondary" id="devolverBtn">Devolver</a>
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
                const id_apre = "<?php echo $usuario['id_apre']; ?>";
                window.location.href = "?b=tamiz&s=actualizarDatosUsuario&identificacion=" + id_apre;
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