<main>
    <div class="main_header">
        <a id="profileLink"><i class="fa-solid fa-user-tie"></i></a>
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

<div class="profile-card hidden" id="profileCard"> 
    <div>
        <div class="profile-header">
            <i class="fa-solid fa-pen-to-square"></i>
            <p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
            <i class="fa-solid fa-xmark" id="toggleProfileForm" style="cursor: pointer;"></i>
        </div>
        <div class="profile-content">
            <form id="profileForm" action="?b=enfermeria&s=updateUser" method="post">
                <label>Nombre de usuario*</label>
                <input type="text" class="user" name="user" value="<?php echo isset($user['user_del']) ? $user['user_del'] : ''; ?>" readonly>
                <label>Contraseña</label>
                <input type="text" class="pasw" name="pasw" value="<?php echo isset($user['pasw_del']) ? $user['pasw_del'] : ''; ?>" disabled>

                <label>Nombres*</label>
                <input type="text" class="name" name="name" value="<?php echo isset($user['name_del']) ? $user['name_del'] : ''; ?>">
                <label>Apellidos*</label>
                <input type="text" class="nameApe" name="nameApe" value="<?php echo isset($user['apelli_del']) ? $user['apelli_del'] : ''; ?>">
                <label>Teléfono*</label>
                <input type="number" class="tel" name="tel" value="<?php echo isset($user['tel_del']) ? $user['tel_del'] : ''; ?>">
                <label>Email Institucional*</label>
                <input type="email" class="email" name="email" value="<?php echo isset($user['email_']) ? $user['email_'] : ''; ?>">

                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>  
</div>

<script src="assets/js/profile.js"></script>