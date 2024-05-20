

    <main> 
        <div class="main_header">
            <a href="/view/admin-view/admin_porfile.html"><i class="fa-solid fa-user-tie"></i></a>
            <p> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>  </p>
        </div>
        <div class="main_body">
            <div>
                <a href="admin-view/admin_delegados.php">
                    <div>
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <p> Delegados</p>
                </a>    
                <a href="index.html">
                    <div>
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <p> Buscar Tamizaje</p>
                </a>                   
            </div>
            <div>
                <img src="assets/img/logo-4remove.png" alt="">
            </div>
        </div>
    </main>
    
