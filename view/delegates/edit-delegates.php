<!-- edit.php -->
<?php
if (isset($user)) :
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Editar Usuario</title>
        <link rel="stylesheet" href="assets/css/static/header_user.css">
        <link rel="stylesheet" href="assets/css/user/admin/admin.css">
    </head>

    <body>
        <?php require_once "view/heder_user.php"; ?>
        <main>
            <h2>Editar Usuario</h2>
            <form id="editForm" action="?b=admin&s=updateUser" method="post">
                <input type="hidden" name="user_del" value="<?php echo htmlspecialchars($user['user_del']); ?>">
                <label for="name_del">Nombres:</label>
                <input type="text" id="name_del" name="name_del" value="<?php echo htmlspecialchars($user['name_del']); ?>" required>

                <label for="apelli_del">Apellidos:</label>
                <input type="text" id="apelli_del" name="apelli_del" value="<?php echo htmlspecialchars($user['apelli_del']); ?>" required>

                <label for="tel_del">Teléfono:</label>
                <input type="text" id="tel_del" name="tel_del" value="<?php echo htmlspecialchars($user['tel_del']); ?>" required>

                <label for="email_del">Email:</label>
                <input type="email" id="email_del" name="email_del" value="<?php echo htmlspecialchars($user['email_del']); ?>" required>

                <label for="email_inst_del">Email Institucional:</label>
                <input type="email" id="email_inst_del" name="email_inst_del" value="<?php echo htmlspecialchars($user['email_inst_del']); ?>" required>

                <button type="submit">Guardar</button>
            </form>
        </main>

        <script src="assets/js/confi.js"></script>


    </body>

    </html>
<?php endif; ?>