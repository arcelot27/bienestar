document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    const profileCard = document.querySelector('.profile-card');
    const profileLink = document.getElementById('profileLink');
    const toggleProfileForm = document.getElementById('toggleProfileForm');

    if (profileLink) {
        profileLink.addEventListener("click", function(event) {
            event.preventDefault();
            profileCard.classList.remove('hidden');
            profileCard.style.display = 'block'; // Asegurarse de que esté visible
        });
    }

    if (toggleProfileForm) {
        toggleProfileForm.addEventListener("click", function() {
            profileCard.classList.add('hidden');
            profileCard.style.display = 'none'; // Asegurarse de que esté oculto
        });
    }

    if (profileForm) {
        profileForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Evita el envío del formulario estándar
            
            fetch('?b=enfermeria&s=updateUser', {
                method: 'POST',
                body: new FormData(profileForm)
            })
            .then(response => response.json()) // Aquí se espera la respuesta JSON
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                alert('Error: ' + error.message);
            });
        });
    }
    
});
