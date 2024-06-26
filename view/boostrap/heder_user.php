<body>
    <header class="position-relative">
        <div class="container row align-items-center">
            <div class="col-6 col-md-4">
                <img src="assets/img/logo-5remov.png" alt="Logo" class="img-fluid">
            </div>
            <div class="col-3 col-md-2 text-end position-absolute top-50 end-0 translate-middle-y">
                <a href="#" onclick="openModal()"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </header>

    <div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmar Cierre de Sesión</h5>
                </div>
                <div class="modal-body text-center">
                    <p>¿Estás seguro de que quieres cerrar sesión?</p>
                    <form method="get" action="">
                        <input type="hidden" name="b" value="admin">
                        <input type="hidden" name="s" value="sessionexit">
                        <button type="submit" class="btn btn-success" id="confirmButton">Aceptar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="assets/js/logout_boots.js"></script>