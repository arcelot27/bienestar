
    <main class="container mb-3">
        <div class="main_header mt-3 position-relative">
            <div class="row aling-items-center">
                <div class="col-6 col-md-4">
                    <a href="?b=enfermeria"><i class="fas fa-circle-chevron-left"></i></a>
                </div>
                <div class="col-md-2 col-7 text-center text-aling-center position-absolute">
                    <h3 class="mt-2">Buscar Tamizaje</h3>
                </div>
            </div>
        </div>
        <div class="main_body container mt-4 rounded p-4">
            <h5>Filtros</h5>
            <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Tipo de Documento</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value>Seleccione su tipo de documento</option>
                            <option>Tarjeta de Identidad</option>
                            <option>Cédula de Ciudadanía</option>
                            <option>Cedula de Extranjería</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid type document.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Número de Documento</label>
                    <input type="number" class="form-control" id="validationCustom03" placeholder="123456789" required>
                    <div class="invalid-feedback">
                        Please provide a valid document.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Jornada de Formación</label>
                    <select class="form-select" id="validationCustom04" required>
                        <option selected disabled value>Seleccione la jornada de formación</option>
                            <option>Mañana</option>
                            <option>Tarde</option>
                            <option>Noche</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid training day.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Número de Ficha</label>
                    <input type="number" class="form-control" id="validationCustom03" placeholder="123456789" required>
                    <div class="invalid-feedback">
                        Please provide a valid file.
                    </div>
                </div>
                <div class="col-11 pb-3">
                    <button class="btn btn-primary" type="submit">Limpiar</button>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </main>
    