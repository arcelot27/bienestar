    <main>
        <div class="main_header" onclick="toggleForm()">
            <a ><i class="fa-solid fa-user-nurse"></i></a>
            <p> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>  </p>
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
                <img src="/assets/img/logo-4remove.png" alt="">
            </div>
        </div> 
    </main>

        <div class="profile-content">
            <p><strong>Información</strong></p>
            <form id="profileForm">
                <label>Nombres</label>
                <input type="text" id="nombres" required></input>    
                <label>Apellidos</label>
                <input type="text" id="apellidos" required></input>
                <label>Teléfono</label>
                <input type="number" id="telefono" required></input>
                <label>Email</label>
                <input type="email" id="email" required></input>
                <button type="submit">Guardar</button>
            </form>
        </div>
    </div>