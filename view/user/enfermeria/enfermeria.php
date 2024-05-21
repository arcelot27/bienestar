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
            <form id="profileForm">
                <label>Nombre de usuario</label>
                <input type="text" id="nomuser" name="nomuser">
                <label>Contraseña</label>
                <input type="text" id="contra" name="contra" disabled>
                <label>Nombres</label>
                <input type="text" id="nombres" name="nombres">
                <label>Teléfono</label>
                <input type="number" id="telefono" name="telefono">
                <label>Email Institucional</label>
                <input type="email" id="email" name="email">
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>  
</div>

<script src="assets/js/profile.js"></script>
