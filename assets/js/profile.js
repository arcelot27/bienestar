document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    profileForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const nombres = document.getElementById("nombres").value;
        const apellidos = document.getElementById("apellidos").value;
        const telefono = document.getElementById("telefono").value;
        const email = document.getElementById("email").value;

        if (nombres && apellidos && telefono && email) {
            alert("Datos guardados:\n" + 
                  "Nombres: " + nombres + "\n" + 
                  "Apellidos: " + apellidos + "\n" + 
                  "Teléfono: " + telefono + "\n" + 
                  "Email: " + email);
        } else {
            alert("Por favor, completa todos los campos.");
        }
    });

    function toggleForm() {
        const profileContent = document.querySelector('.profile-content');
        profileContent.classList.toggle('hidden');
    }
});
