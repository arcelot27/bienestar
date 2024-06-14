<body>
<?php
    if(isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        echo "<script>alert('" . htmlspecialchars($mensaje, ENT_QUOTES) . "');</script>";
    }
    ?>
<div>
    <div class="containers">
        <div class="container">
            <img src="assets/img/logo-02.png" alt="">
            <div class="forms">
                <form action="?b=login&s=validaruser" method="post">
                    <input type="text" placeholder="User" name="user">
                    <input type="password" placeholder="Password" id="input" name="pasword">
                    <a href=""><p>Recuperar contraseña</p></a>
                    <input type="submit" placeholder="Enviar">
                </form>
                <a href="index.html"><i class="fa-solid fa-circle-arrow-left"></i><p>HOME</p></a>
            </div>
        </div>
    </div>
</div>
    