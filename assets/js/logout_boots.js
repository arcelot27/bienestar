function openModal() {
    $('#logoutModal').modal('show');
}

// Cerrar el modal al hacer clic fuera de la ventana modal
$(document).ready(function() {
    $('#logoutModal').on('click', function (e) {
        if ($(e.target).is('#logoutModal')) {
            $('#logoutModal').modal('hide');
        }
    });

    // Cerrar el modal al hacer clic en el botón "Cancelar"
    $(document).on('click', '[data-dismiss="modal"]', function() {
        $('#logoutModal').modal('hide');
    });
});