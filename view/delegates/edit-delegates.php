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
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        main {
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        main>div {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        .edit {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #333333;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }

        .guardar {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .guardar:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            font-size: 12pt;
            margin: 5px;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: red;
        }

        .main_header {
            margin-top: 10px;
            margin-left: 10px;
        }

        .main_header a {
            color: #007bff;
            text-decoration: none;
            font-size: 24px;
        }

        .main_header a:hover {
            color: #0056b3;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .modal-header {
            display: flex;
            justify-content: center;
        }

        .modal-body {
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 320px) {
            main>div {
                padding: 10px;
            }

            h2 {
                font-size: 18px;
            }

            label,
            input,
            button {
                font-size: 14px;
            }
        }

        @media (min-width: 321px) and (max-width: 375px) {
            main>div {
                width: 95%;
            }
        }

        @media (min-width: 376px) and (max-width: 768px) {
            main>div {
                width: 90%;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            main>div {
                width: 80%;
            }
        }

        @media (min-width: 1025px) and (max-width: 1440px) {
            main>div {
                width: 60%;
            }
        }

        @media (min-width: 1441px) and (max-width: 2560px) {
            main>div {
                width: 50%;
            }
        }

        @media (min-width: 2561px) {
            main>div {
                width: 40%;
            }
        }
    </style>
</head>

<body>
    <?php require_once "view/heder_user.php"; ?>
    <div class="main_header">
        <a href="?b=Admin&s=delegates"><i class="fas fa-circle-chevron-left"></i></a>
    </div>
    <main>
        <div>
            <h2>Editar Usuario</h2>
            <form class="edit" onsubmit="openeditModal(event)" method="post">
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

                <button class="guardar" type="submit">Guardar</button>
            </form>
        </div>
    </main>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Confirmar Actualización de Usuario</h5>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro que desea guardar los cambios?</p>
                <form method="post" action="">
                    <input type="hidden" name="b" value="admin">
                    <input type="hidden" name="s" value="updateUser">
                    <button type="submit" class="btn btn-success" id="confirmButton">Aceptar</button>
                    <button type="button" class="btn btn-danger" onclick="closeeditModal()">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/confi.js"></script>
</body>

</html>
<?php endif; ?>
