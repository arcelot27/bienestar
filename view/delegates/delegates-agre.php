

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
    

    
    <script src="assets/js/validation.js"></script>
