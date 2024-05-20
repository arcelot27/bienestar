<main>
    <div class="main_header" id="profileLink">
        <a ><i class="fa-solid fa-user-nurse"></i></a>
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
        <div class="profile-header">
            <i class="fa-solid fa-user-nurse"></i>
            <p>Salud</p>
            <i class="fa-solid fa-pen-to-square" onclick="toggleForm()"></i>
        </div>
        <div class="profile-content">
            <p><strong>Información</strong></p>
            <form id="profileForm">
                <label>Nombres</label>
                <input type="text" id="nombres" name="nombres">
                <label>Apellidos</label>
                <input type="text" id="apellidos" name="apellidos">
                <label>Teléfono</label>
                <input type="number" id="telefono" name="telefono">
                <label>Email</label>
                <input type="email" id="email" name="email">
                <button type="submit">Guardar</button>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>



    </div>