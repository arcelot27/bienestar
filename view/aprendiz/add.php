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
    </style>
</head>
<body>
    <header>
        <h1>Agregar Alumno</h1>
    </header>
    <main class="main_body">
        <div class="container">
            <form action="/path/to/your/controller" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <select class="form-control" id="jornada" name="jornada" required>
                        <option value="">Selecciona jornada</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noche">Noche</option>
                    </select>
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
</body>
</html>
