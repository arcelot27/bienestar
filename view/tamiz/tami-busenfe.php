<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamizaje</title>
    <link rel="stylesheet" href="assets/css/tamiz/tami-bus.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2619cec24c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="position-relative">
        <div class="container row align-items-center">
            <div class="col-6 col-md-4">
                <img src="/assets/img/logo-5remov.png" alt class="img-fluid">
            </div>
            <div class="col-3 col-md-2 text-right position-absolute top-50 end-0 translate-middle-y">
                <a href="/view/index.html" class="ms-4"><i class="fas fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </header>
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
</body>
</html>