document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    const profileCard = document.querySelector('.profile-card');
    const profileLink = document.getElementById('profileLink');
    const profileToggleIcon = document.querySelector('.fa-pen-to-square');

    if (profileForm) {
        // Evento para mostrar la ventana emergente al hacer clic en el enlace de perfil
        profileLink.addEventListener("click", function(event) {
            event.preventDefault();  // Prevenir la redirección
            profileCard.classList.remove('hidden');
        });

        // Evento para alternar la visibilidad del formulario en la ventana emergente
        profileToggleIcon.addEventListener("click", function() {
            profileCard.classList.toggle('hidden');
            toggleForm(); // Llamar a la función toggleForm para alternar la visibilidad del formulario
        });

        // Función para alternar la visibilidad del formulario en la ventana emergente
        function toggleForm() {
            const profileContent = document.querySelector('.profile-content');
            profileContent.classList.toggle('hidden');
        }
    }
});
