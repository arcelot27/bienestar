<main>
    <div class="main_header">
        <a id="profileLink"><i class="fa-solid fa-user-nurse"></i></a>
        <p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
    </div>
    <div class="main_body">
        <div>
            <a href="#">
                <div>
                    <i class="fa-solid fa-plus"></i>
                </div>
                <p>Realizar Tamizaje</p>
            </a>
            <a href="#">
                <div>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <p>Consultar Tamizaje</p>
            </a>
        </div>
        <div>
            <img src="assets/img/logo-4remove.png" alt="">
        </div>
    </div>
</main>

<div class="profile-card hidden">
    <div>
        <div class="profile-header">
            <i class="fa-solid fa-user-nurse"></i>
            <p><p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p></p>
            <i class="fa-solid fa-pen-to-square" id="toggleProfileForm"></i>
        </div>
        <div class="profile-content">
            <form id="profileForm" action="?b=enfermeria&s=updateUser" method="post">
                <label>Nombre de usuario</label>
                <input type="text" class="user-del" name="user_del" value="<?php echo isset($user['user_del']) ? $user['user_del'] : ''; ?>" readonly>
                <label>Contraseña</label>
                <input type="text" class="pasw-del" name="pasw_del" value="<?php echo isset($user['pasw_del']) ? $user['pasw_del'] : ''; ?>" disabled>
                <label>Nombres</label>
                <input type="text" class="name-del" name="name_del" value="<?php echo isset($user['name_del']) ? $user['name_del'] : ''; ?>">
                <label>Apellidos</label>
                <input type="text" class="apelli-del" name="apelli_del" value="<?php echo isset($user['apelli_del']) ? $user['apelli_del'] : ''; ?>">
                <label>Teléfono</label>
                <input type="number" class="tel-del" name="tel_del" value="<?php echo isset($user['tel_del']) ? $user['tel_del'] : ''; ?>">
                <label>Email Institucional</label>
                <input type="email" class="email-del" name="email_del" value="<?php echo isset($user['email_del']) ? $user['email_del'] : ''; ?>">
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>  
</div>

<script src="assets/js/profile.js"></script>
