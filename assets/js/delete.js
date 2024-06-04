// assets/js/delete.js
document.addEventListener("DOMContentLoaded", function() {
    const deleteLinks = document.querySelectorAll(".delete-link");

    deleteLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();

            const confirmation = confirm("¿Está seguro de que desea eliminar este usuario?");
            if (confirmation) {
                window.location.href = link.href;
            }
        });
    });
});
