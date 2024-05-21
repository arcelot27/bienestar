document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    const profileCard = document.querySelector('.profile-card');
    const profileLink = document.getElementById('profileLink');
    const profileToggleIcon = document.querySelector('.fa-pen-to-square');

    if (profileForm) {
        profileLink.addEventListener("click", function(event) {
            event.preventDefault();  // Prevenir la redirección
            profileCard.classList.remove('hidden');
        });

        profileToggleIcon.addEventListener("click", function() {
            profileCard.classList.toggle('hidden');
        });
    }
});
