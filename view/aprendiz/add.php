<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        header {
            background-color: #9BC1DF;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        header h1 {
            color: #234788;
            font-size: 36px;
            margin-bottom: 0;
        }

        .main_body {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .form-group label {
            color: #234788;
            font-weight: bold;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-success {
            background-color: #54BC1D;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #234788;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
        }

        @media (min-width: 400px) {
            header h1 {
                font-size: 40px;
            }
            .form-control {
                font-size: 14pt;
            }
            .btn {
                font-size: 14pt;
                padding: 15px 30px;
            }
        }

        @media (min-width: 600px) {
            .main_body {
                padding: 40px;
            }
        }

        @media (min-width: 900px) {
            .main_body {
                padding: 50px;
            }
        }

        @media (min-width: 1920px) {
            .main_body {
                padding: 60px;
            }
        }

        @media (min-width: 3840px) {
            .main_body {
                padding: 70px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Agregar Alumno</h1>
    </header>
    <main class="main_body">
        <div class="container">
            <form id="alumnoForm" action="/path/to/your/controller" method="POST" onsubmit="return confirmarInscripcion()">
                <div class="form-group">
                    <label for="name_apre">Nombre</label>
                    <input type="text" class="form-control" id="name_apre" name="name_apre" required>
                </div>
                <div class="form-group">
                    <label for="apelli_apre">Apellido</label>
                    <input type="text" class="form-control" id="apelli_apre" name="apelli_apre" required>
                </div>
                <div class="form-group">
                    <label for="tipo_documen_apre">Tipo de Documento</label>
                    <select class="form-control" id="tipo_documen_apre" name="tipo_documen_apre" required>
                        <option value="">Selecciona tipo de documento</option>
                        <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                        <option value="Registro Civil">Registro Civil</option>
                        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="Permiso Especial de Permanencia">Permiso Especial de Permanencia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dni_apre">DNI</label>
                    <input type="number" class="form-control" id="dni_apre" name="dni_apre" required>
                </div>
                <div class="form-group">
                    <label for="tel_apre">Teléfono</label>
                    <input type="number" class="form-control" id="tel_apre" name="tel_apre">
                </div>
                <div class="form-group">
                    <label for="email_apre">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email_apre" name="email_apre" required>
                </div>
                <div class="form-group">
                    <label for="ficha_apre">Ficha</label>
                    <input type="number" class="form-control" id="ficha_apre" name="ficha_apre" required>
                </div>
                <div class="form-group">
                    <label for="jornada_apre">Jornada</label>
                    <select class="form-control" id="jornada_apre" name="jornada_apre" required>
                        <option value="">Selecciona jornada</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name_fami_apre">Nombre del Familiar</label>
                    <input type="text" class="form-control" id="name_fami_apre" name="name_fami_apre" required>
                </div>
                <div class="form-group">
                    <label for="num_fami_apre">Teléfono del Familiar</label>
                    <input type="number" class="form-control" id="num_fami_apre" name="num_fami_apre" required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                </div>
            </form>
        </div>
    </main>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmarInscripcion() {
            return confirm("¿Estás seguro de que deseas inscribir a este alumno?");
        }
    </script>
</body>
</html>
