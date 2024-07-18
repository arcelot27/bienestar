<?php
if (isset($_GET['message'])) {
    echo "<script type='text/javascript'>
            alert('" . $_GET['message'] . "');
          </script>";
}
?>

<main>
    <div class="main_header">
        <a id="profileLink"><i class="fa-solid fa-user-nurse"></i></a>
        <p><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></p>
    </div>
    <div class="main_body">
        <div>
            <a href="?b=tamiz&s=enfe">
                <div>
                    <i class="fa-solid fa-plus"></i>
                </div>
                <p>Realizar Tamizaje</p>
            </a>
            <a href="?b=tamiz&s=busenfe">
                <div>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <p>Consultar Tamizaje</p>
            </a>
            <a href="?b=apren">
                <div>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <p>Aprendices</p>
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
                <div>
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" class="pasw" name="pasw" value="<?php echo isset($user['pasw_del']) ? $user['pasw_del'] : ''; ?>">
                    <span class="input-group-text" style="cursor: pointer;"><i class="far fa-eye-slash" id="togglePassword"></i></span>
                </div>
                <script>
                    const togglePassword = document.querySelector("#togglePassword");
                    const password = document.querySelector("#password");

                    togglePassword.addEventListener("click", function () {
                    
                    // toggle the type attribute
                    const type = password.getAttribute("type") === "password" ? "text" : "password";
                    password.setAttribute("type", type);

                    // toggle the eye icon
                    this.classList.toggle('fa-eye');
                    });
                </script>

                <label>Nombres*</label>
                <input type="text" class="name" name="name" value="<?php echo isset($user['name_del']) ? $user['name_del'] : ''; ?>">
                <label>Apellidos*</label>
                <input type="text" class="nameApe" name="nameApe" value="<?php echo isset($user['apelli_del']) ? $user['apelli_del'] : ''; ?>">
                <label>Teléfono*</label>
                <input type="number" class="tel" name="tel" value="<?php echo isset($user['tel_del']) ? $user['tel_del'] : ''; ?>">
                <label>Email Institucional*</label>
                <input type="email" class="email" name="email" value="<?php echo isset($user['email_inst_del']) ? $user['email_inst_del'] : ''; ?>">

                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>  
</div>

<script src="assets/js/profile.js"></script>