<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tamizaje</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .btn-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="d-flex justify-content-start mb-4">
                    <button type="button" class="btn btn-primary btn-circle" onclick="window.location.href='?b=enfermeria'">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                </div>
                <h1>Formulario de Tamizaje</h1>
                <div class="mt-4">
                    <button type="button" class="btn btn-primary btn-lg btn-block"  data-toggle="modal" da-ta-target="#newTamizajeModal" >Nuevo Tamizaje</button>
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-secondary btn-lg btn-block" data-toggle="modal" data-target="#validationModal">Tamizaje Existente</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Nuevo Tamizaje -->
    <div class="modal fade" id="newTamizajeModal" tabindex="-1" aria-labelledby="newTamizajeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTamizajeModalLabel">Nuevo Tamizaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newTamizajeForm" action="view/tamiz/add_enfe.php">
                        <div class="form-group">
                            <label for="newTamizajeName">Nombre del Tamizaje</label>
                            <input type="text" class="form-control" id="newTamizajeName" required>
                        </div>
                        <div id="newTamizajeResult" class="mt-3"></div>
                        <button type="submit" class="btn btn-primary">Validar y Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Tamizaje Existente -->
    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validationModalLabel">Validación de Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="validationForm">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="applicationDate">Fecha de Aplicación</label>
                            <input type="date" class="form-control" id="applicationDate">
                        </div>
                        <div id="validationResult" class="mt-3"></div>
                        <button type="submit" class="btn btn-primary">Validar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#validationForm").on("submit", function(event) {
                event.preventDefault();

                var name = $("#name").val();
                var applicationDate = $("#applicationDate").val();

                $.ajax({
                    url: 'validate.php', // URL del script PHP para validar los datos
                    method: 'POST',
                    data: { name: name, applicationDate: applicationDate },
                    success: function(response) {
                        $("#validationResult").html(response);
                    },
                    error: function() {
                        $("#validationResult").html('<div class="alert alert-danger">Hubo un error en la validación. Inténtalo de nuevo.</div>');
                    }
                });
            });

            $("#newTamizajeForm").on("submit", function(event) {
                event.preventDefault();

                var newTamizajeName = $("#newTamizajeName").val();

                $.ajax({
                    url: 'validate_new.php', // URL del script PHP para validar y crear el tamizaje
                    method: 'POST',
                    data: { newTamizajeName: newTamizajeName },
                    success: function(response) {
                        $("#newTamizajeResult").html(response);
                    },
                    error: function() {
                        $("#newTamizajeResult").html('<div class="alert alert-danger">Hubo un error en la validación. Inténtalo de nuevo.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
