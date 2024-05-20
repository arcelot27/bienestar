    <main>
        <div class="main_header">
            <a href="?b=enfermeria&?s=Inicio?p=porfile"><i class="fa-solid fa-user-nurse"></i></a>
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

