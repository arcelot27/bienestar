function opendelModal() {
    $('#deleteModal').modal('show');
}

function closeModal() {
    $('#deleteModal').modal('hide');
}

// Cerrar el modal al hacer clic fuera de la ventana modal
$(document).ready(function(){
    $('#deleteModal').on('hidden.bs.modal', function () {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });

    $('#deleteModal').on('click', function (e) {
        if ($(e.target).is('#deleteModal')) {
            closeModal();
        }
    });
});