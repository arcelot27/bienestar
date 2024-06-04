document.addEventListener("DOMContentLoaded", function() {
    const editForm = document.getElementById("editForm");

    editForm.addEventListener("submit", function(event) {
        const confirmation = confirm("¿Está seguro de que desea guardar los cambios?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
});