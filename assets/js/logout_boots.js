function openModal() {
    $('#logoutModal').modal('show');
}

function closeModal() {
    $('#logoutModal').modal('hide');
}

// Cerrar el modal al hacer clic fuera de la ventana modal
$(document).ready(function(){
    $('#logoutModal').on('hidden.bs.modal', function () {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });

    $('#logoutModal').on('click', function (e) {
        if ($(e.target).is('#logoutModal')) {
            closeModal();
        }
    });
});