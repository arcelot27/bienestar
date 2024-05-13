

    <main> 
        <div class="main_header">
            <a href="/view/admin-view/admin_porfile.html"><i class="fa-solid fa-user-tie"></i></a>
            <p> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>  </p>
        </div>
        <div class="main_body">
            <div>
                <a href="admin-view/admin_delegados.html">
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

    <footer>
        <div class="red_social">
            <div>
                <p>Siguenos en nuestras redes sociales:</p>
            </div>
            <div>
                <a href="#"><i class="fa-brands fa-facebook" style="color: white;"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter" style="color: white;"></i></a>
                <a href="#"><i class="fa-solid fa-book-open" style="color: white;"></i></a>
            </div>
        </div>
        <div class="ff">
            <div class="info-footer">
                <p><b>SIFT - Sistema Identificación y Seguimiento de Aprendices</b></p>
                <p><b>Misión:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                <p><b>Visión:</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>
            <div class="info2-footer">
                <p><b>Menú: </b></p>
                <p>¿Qué es SIFT?</p>
                <p>¿Para qué sirve SIFT?</p>
            </div>
            <div class="info3-footer">
                <p><b>Contacto:</b></p>
                <div>
                    <p>La Plata, Huila</p>
                    <p>biaprendiz@mail.com</p>
                    <p>Cra 7 No. 5 - 67</p>
                    <p>+57 555 55 55</p>
                </div>
                
            </div>
        </div>
        <div class="copy_footer">
            <p>Copyright 2024 - <strong>SIFT - Sistema Identificación y Seguimiento de Aprendices</strong> © by ********* and **********</p><p></p>
        </div>
    </footer>
    
</body>
</html>