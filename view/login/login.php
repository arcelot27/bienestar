<body>
    <?php
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        echo "<script>alert('" . htmlspecialchars($mensaje, ENT_QUOTES) . "');</script>";
    }
    ?>
    <main>
        <div class="container">
            <div class="forms">
                <img src="assets/img/logo-02.png" alt="Logo">
                <form action="?b=login&s=validaruser" method="post">
                    <input type="text" placeholder="Usuario" name="user">
                    <input type="password" placeholder="Contraseña" id="input" name="password">
                    <a href="#">Recuperar contraseña</a>
                    <input type="submit" value="Enviar">
                </form>
                <a href="index.html"><i class="fa-solid fa-circle-arrow-left"></i> <span>HOME</span></a>
            </div>
        </div>
    </main>