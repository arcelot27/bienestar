<body>
    <header>
        <img src="assets/img/logo-5remov.png" alt="Logo">
        <a href="#" onclick="openModal()"><i class="fas fa-arrow-right-from-bracket"></i></a>
    </header>

    <div id="logoutModal" class="modal" style="display:none;">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirmar Cierre de Sesión</h5>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que quieres cerrar sesión?</p>
            </div>
            <div class="modal-footer">
                <form method="get" action="">
                    <input type="hidden" name="b" value="admin">
                    <input type="hidden" name="s" value="sessionexit">
                    <button type="submit" class="btn-success" id="confirmButton">Aceptar</button>
                    <button type="button" class="btn-cancel" id="cancelButton" onclick="closeModal()">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

<script src="assets/js/logout.js"></script>