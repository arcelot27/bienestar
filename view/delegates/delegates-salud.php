<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sift</title>
    <link rel="stylesheet" href="assets/css/del/delegates-profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2619cec24c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="position-relative">
        <div class="container row align-items-center">
            <div class="col-6 col-md-4">
                <img src="assets/img/logo-5remov.png" alt="" class="img-fluid">
            </div>
            <div class="col-3 col-md-2 text-right position-absolute top-50 end-0 translate-middle-y">
                <a href="?b=admin&s=sessionexit" onclick="return confirm('¿Estás seguro de que deseas cerrar la sesión?')" style="margin-right: 10px;" class="ms-4"><i class="fas fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </header>
    <main class="container">
        <div class="main_header mt-3 ms-3">
            <a href="?b=Admin&s=delegates"><i class="fas fa-circle-chevron-left"></i></a>
        </div>
        <div class="main_body position-relative">
            <div class="row">
                <div class="col text-center">
                    <div class="log_porf">
                        <i class="fa-solid fa-user-nurse"></i>
                    </div>
                    <p><b>Enfermeria</b></p>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre de usuario</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Email institucional</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)) : ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($user['user_del']); ?></td>
                                            <td><?php echo htmlspecialchars($user['name_del']); ?></td>
                                            <td><?php echo htmlspecialchars($user['apelli_del']); ?></td>
                                            <td><?php echo htmlspecialchars($user['tel_del']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email_del']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email_inst_del']); ?></td>
                                            <td><a href="?b=admin&s=edit&id=<?php echo $user['user_del']; ?>" class="link-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                            <td><a href="?b=admin&s=delete&id=<?php echo $user['user_del']; ?>" class="link-danger"><i class="fa-solid fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="8">No hay usuarios disponibles.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>

</body>
</html> 