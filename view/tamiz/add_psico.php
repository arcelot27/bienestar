<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tamizaje</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Formulario de Tamizaje</h1>
        <form id="tamizajeForm" onsubmit="return confirmarInscripcion()">
                <!-- Campo de búsqueda inicial -->
                <div class="form-group">
                    <label for="buscar">Buscar:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="buscar" placeholder="Ingrese término de búsqueda">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="buscarBtn">Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre">1. Nombre</label>
                    <input type="text" class="form-control" id="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">2. Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento">3. Tipo de Documento</label>
                    <select class="form-control" id="tipoDocumento" required>
                        <option value="">Seleccione</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="PASAPORTE">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numeroDocumento">4. Número de Documento</label>
                    <input type="text" class="form-control" id="numeroDocumento" required>
                </div>
                <div class="form-group">
                    <label for="edad">5. Edad</label>
                    <input type="number" class="form-control" id="edad" required>
                </div>
                <div class="form-group">
                    <label for="estadoCivil">6. Estado Civil</label>
                    <select class="form-control" id="estadoCivil" required>
                        <option value="">Seleccione</option>
                        <option value="CASADO(A)">Casado(a)</option>
                        <option value="SOLTERO(A)">Soltero(a)</option>
                        <option value="UNION LIBRE">Unión Libre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sexo">7. Sexo</label>
                    <select class="form-control" id="sexo" required>
                        <option value="">Seleccione</option>
                        <option value="FEMENINO">Femenino</option>
                        <option value="MASCULINO">Masculino</option>
                        <option value="IDENTIDAD DE GÉNERO">Identidad de Género</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="identidadGenero">8. Si su respuesta es "Identidad de Género", escriba cuál</label>
                    <input type="text" class="form-control" id="identidadGenero">
                </div>
                <div class="form-group">
                    <label for="grupoEtnico">9. ¿Pertenece a algún grupo étnico?</label>
                    <select class="form-control" id="grupoEtnico" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grupoEtnicoCual">10. Si su anterior respuesta fue "sí", escriba a qué grupo étnico pertenece</label>
                    <input type="text" class="form-control" id="grupoEtnicoCual">
                </div>
                <div class="form-group">
                    <label for="estrato">11. Estrato</label>
                    <select class="form-control" id="estrato" required>
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="NO SABE">No sabe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="zonaResidencia">12. Reside en una zona</label>
                    <select class="form-control" id="zonaResidencia" required>
                        <option value="">Seleccione</option>
                        <option value="RURAL">Rural</option>
                        <option value="URBANA">Urbana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lugarResidencia">13. Lugar de Residencia</label>
                    <input type="text" class="form-control" id="lugarResidencia" required>
                </div>
                <div class="form-group">
                    <label for="vivienda">14. Cuenta con vivienda</label>
                    <select class="form-control" id="vivienda" required>
                        <option value="">Seleccione</option>
                        <option value="PROPIA">Propia</option>
                        <option value="ARRENDADA">Arrendada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>15. ¿Con qué servicios públicos cuenta?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="energia" value="ENERGIA">
                        <label class="form-check-label" for="energia">
                            Energía
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gas" value="GAS">
                        <label class="form-check-label" for="gas">
                            Gas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agua" value="AGUA">
                        <label class="form-check-label" for="agua">
                            Agua
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="alcantarillado" value="ALCANTARILLADO">
                        <label class="form-check-label" for="alcantarillado">
                            Alcantarillado
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="internet" value="INTERNET">
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ninguno" value="NINGUNO">
                        <label class="form-check-label" for="ninguno">
                            Ninguno
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>16. ¿En qué ocupa su tiempo libre?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre1" value="PASAR TIEMPO EN FAMILIA">
                        <label class="form-check-label" for="tiempoLibre1">
                            Pasar tiempo en familia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre2" value="ESTUDIAR">
                        <label class="form-check-label" for="tiempoLibre2">
                            Estudiar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre3" value="JUGAR">
                        <label class="form-check-label" for="tiempoLibre3">
                            Jugar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre4" value="TRABAJAR">
                        <label class="form-check-label" for="tiempoLibre4">
                            Trabajar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre5" value="LABORES DOMESTICAS">
                        <label class="form-check-label" for="tiempoLibre5">
                            Labores domésticas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre6" value="RECREACION">
                        <label class="form-check-label" for="tiempoLibre6">
                            Recreación
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiempoLibre7" value="NINGUNA">
                        <label class="form-check-label" for="tiempoLibre7">
                            Ninguna
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hijos">17. ¿Tiene hijos?</label>
                    <input type="number" class="form-control" id="hijos" required>
                </div>
                <div class="form-group">
                    <label for="embarazo">18. ¿Se encuentra en embarazo?</label>
                    <select class="form-control" id="embarazo" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="controlesPrenatales">19. Si su anterior respuesta fue "sí", ¿ya inició controles prenatales?</label>
                    <select class="form-control" id="controlesPrenatales" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoMedico">20. ¿Tiene algún diagnóstico médico?</label>
                    <select class="form-control" id="diagnosticoMedico" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoMedicoCual">21. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="diagnosticoMedicoCual">
                </div>
                <div class="form-group">
                    <label for="medicamento">¿Toma algún medicamento?</label>
                    <select class="form-control" id="medicamento" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medicamentoCual">22. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" id="medicamentoCual">
                </div>
                <div class="form-group">
                    <label>23. ¿Tiene alguna de las siguientes limitaciones o discapacidad?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones1" value="MOTORA">
                        <label class="form-check-label" for="limitaciones1">
                            Motora
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones2" value="AUDITIVA">
                        <label class="form-check-label" for="limitaciones2">
                            Auditiva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones3" value="VISUAL">
                        <label class="form-check-label" for="limitaciones3">
                            Visual
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones4" value="COGNITIVA">
                        <label class="form-check-label" for="limitaciones4">
                            Cognitiva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones5" value="MENTAL">
                        <label class="form-check-label" for="limitaciones5">
                            Mental
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones6" value="MULTIPLE">
                        <label class="form-check-label" for="limitaciones6">
                            Múltiple
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones7" value="SORDOCEGUERA">
                        <label class="form-check-label" for="limitaciones7">
                            Sordoceguera
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="limitaciones8" value="NINGUNO">
                        <label class="form-check-label" for="limitaciones8">
                            Ninguno
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>24. ¿Conoce alguno de estos antecedentes en su familia?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes1" value="DIABETES">
                        <label class="form-check-label" for="antecedentes1">
                            Diabetes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes2" value="HIPERTENSION ARTERIAL">
                        <label class="form-check-label" for="antecedentes2">
                            Hipertensión arterial
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes3" value="CANCER">
                        <label class="form-check-label" for="antecedentes3">
                            Cáncer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes4" value="ENFERMEDAD PULMONAR">
                        <label class="form-check-label" for="antecedentes4">
                            Enfermedad pulmonar (trombosis)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes5" value="ENFERMEDADES MENTALES">
                        <label class="form-check-label" for="antecedentes5">
                            Enfermedades mentales
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes6" value="NINGUNA">
                        <label class="form-check-label" for="antecedentes6">
                            Ninguna
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="antecedentes7" value="OTRA">
                        <label class="form-check-label" for="antecedentes7">
                            Otra
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="antecedentesFamiliaOtra">25. Si su anterior respuesta fue "otra", indique cuál</label>
                    <input type="text" class="form-control" id="antecedentesFamiliaOtra">
                </div>
                <div class="form-group">
                    <label for="numeroCelular">26. Número de Celular</label>
                    <input type="number" class="form-control" id="numeroCelular" required>
                </div>
                <div class="form-group">
                    <label for="correo">27. Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo" required>
                </div>
                <div class="form-group">
                    <label for="numeroFicha">28. Número de Ficha</label>
                    <input type="number" class="form-control" id="numeroFicha" required>
                </div>
                <div class="form-group">
                    <label for="jornada">29. Jornada</label>
                    <select class="form-control" id="jornada" required>
                        <option value="">Seleccione</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="NOCTURNA">Nocturna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contactoEmergencia">30. Contacto de Emergencia</label>
                    <input type="text" class="form-control" id="contactoEmergencia" required>
                </div>
                <div class="form-group">
                    <label for="numeroContactoEmergencia">31. Número de Contacto de Emergencia</label>
                    <input type="number" class="form-control" id="numeroContactoEmergencia" required>
                </div>


            <div class="section-header">Información Personal</div>
 
            <div class="form-group">
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
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#tamizajeForm").on("submit", function(event) {
            event.preventDefault();
            // Lógica para enviar los datos al servidor

            // Preguntar si desea agregar a otra persona o culminar con el formulario
            if (confirm("¿Desea agregar a otra persona?")) {
                // Lógica para hacer otro registro
                $("#tamizajeForm")[0].reset();
            } else {
                // Lógica para culminar con el formulario
                if (confirm("¿Está seguro que desea culminar el formulario?")) {
                    window.location.href = 'otra_pagina.html'; // Cambia esto a la URL donde deseas redirigir
                }
            }
        });

        // Ejemplo de búsqueda con el botón
        $("#buscarBtn").on("click", function() {
            var searchTerm = $("#buscar").val().trim();
            if (searchTerm !== "") {
                // Aquí puedes implementar la lógica de búsqueda
                alert("Realizando búsqueda con término: " + searchTerm);
            } else {
                alert("Por favor ingrese un término de búsqueda válido.");
            }
        });
    });
</script>

</body>
</html>