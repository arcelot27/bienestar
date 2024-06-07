<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Delegados</title>
    <link rel="stylesheet" href="assets/css/del/delegates-add.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2619cec24c.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="position-relative">
        <div class="container row align-items-center">
            <div class="col-6 col-md-4">
                <img src="assets/img/logo-5remov.png" alt="Logo" class="img-fluid">
            </div>
            <div class="col-3 col-md-2 text-end position-absolute top-50 end-0 translate-middle-y">
                <a href="?b=Admin" class="ms-4"><i class="fas fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </header>
    <main class="container mb-3">
        <div class="main_header mt-3 position-relative">
            <div class="row align-items-center">
                <div class="col-6 col-md-4">
                    <a href="?b=Admin&s=delegates"><i class="fas fa-circle-chevron-left"></i></a>
                </div>
                <div class="col-md-2 col-6 mt-1 text-center position-absolute top-50 start-50 translate-middle">
                    <h3 class="mt-2">Formulario</h3>
                </div>
            </div>
        </div>
        <div class="main_body container mt-4 rounded p-4">
            <h5>Datos Personales - Delegado</h5>
            <?php
            if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                echo '<div class="alert alert-danger">';
                foreach ($_SESSION['errors'] as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
                unset($_SESSION['errors']); // Limpiar los errores después de mostrarlos
            }
            ?>
            <form class="row g-3 needs-validation" id="delegatesForm" action="?b=Admin&s=guardarDelegado" method="POST" novalidate>
                <div class="col-md-4">
                    <label for="username" class="form-label">Nombre del usuario</label>
                    <input type="text" class="form-control" id="username" name="name" placeholder="user1" required>
                    <div class="invalid-feedback">
                        El nombre del usuario es obligatorio.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nombres" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Pepito Andrés" required>
                    <div class="invalid-feedback">
                        Los nombres son obligatorios.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Pérez Ramírez" required>
                    <div class="invalid-feedback">
                        Los apellidos son obligatorios.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="555 555 55" required>
                    <div class="invalid-feedback">
                        El teléfono es obligatorio.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
                    <select class="form-select" id="tipoDocumento" name="tipoDocumento" required>
                        <option selected disabled value>Seleccione su tipo de documento</option>
                        <option <?php if (isset($formData['tipoDocumento']) && $formData['tipoDocumento'] == "Tarjeta de Identidad") echo "selected"; ?>>Tarjeta de Identidad</option>
                        <option <?php if (isset($formData['tipoDocumento']) && $formData['tipoDocumento'] == "Cédula de Ciudadanía") echo "selected"; ?>>Cédula de Ciudadanía</option>
                        <option <?php if (isset($formData['tipoDocumento']) && $formData['tipoDocumento'] == "Cédula de Extranjería") echo "selected"; ?>>Cédula de Extranjería</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, seleccione un tipo de documento válido.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="numeroDocumento" class="form-label">Número de Documento</label>
                    <input type="number" class="form-control" id="numeroDocumento" name="numeroDocumento" placeholder="123456789" required>
                    <div class="invalid-feedback">
                        Por favor, proporcione un número de documento válido.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Por favor, elija un email válido.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="emailInstitucional" class="form-label">Email Institucional</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" id="emailInstitucional" name="emailInstitucional" placeholder="example@sena.edu.co">
                    </div>
                </div>
                <h5>Rol - Delegado</h5>
                <div class="col-md-4">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option selected disabled value>Seleccione el rol</option>
                        <option value="1" <?php if (isset($formData['rol']) && $formData['rol'] == 1) echo "selected"; ?>>Deporte</option>
                        <option value="2" <?php if (isset($formData['rol']) && $formData['rol'] == 2) echo "selected"; ?>>Psicosocial</option>
                        <option value="4" <?php if (isset($formData['rol']) && $formData['rol'] == 4) echo "selected"; ?>>Salud</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, seleccione un rol válido.
                    </div>
                </div>
                <div class="col-11 pb-3">
                    <button class="btn btn-primary" type="reset">Limpiar</button>
                    <button class="btn btn-primary" type="submit">Agregar</button>
                </div>
            </form>
        </div>
    </main>
    <footer class="text-white">
        <div class="container">
            <div class="row">
                <div>
                    <div class="red_social border-bottom text-center position-relative">
                        <p class="mt-2 mb-2">Síguenos en nuestras redes sociales:</p>
                        <div>
                            <a href="#" class="link-light m-2"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="link-light m-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="link-light m-2"><i class="fas fa-book-open"></i></a>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="contend_footer">
                        <div class="border-bottom text-center">
                            <p class="mt-2 mb-2"><b>SIFT - Sistema Identificación y Seguimiento de Aprendices</b></p>
                            <p><b>Misión:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                            <p><b>Visión:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        </div>
                        <div class="border-bottom text-center">
                            <p class="mt-2"><b>Menú:</b></p>
                            <p>¿Qué es SIFT?</p>
                            <p>¿Para qué sirve SIFT?</p>
                        </div>
                        <div class="text-center">
                            <p class="mt-2"><b>Contacto:</b></p>
                            <p>La Plata, Huila</p>
                            <p>biaprendiz@mail.com</p>
                            <p>Cra 7 No. 5 - 67</p>
                            <p>+57 555 55 55</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="copy_footer container rounded-pill">
                <p class="pt-1 pb-1">Copyright 2024 - <strong>SIFT - Sistema Identificación y Seguimiento de Aprendices</strong> © by ********* and **********</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/validation.js"></script>

</body>

</html>