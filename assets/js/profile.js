document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    const profileCard = document.querySelector('.profile-card');
    const profileLink = document.getElementById('profileLink');
    const profileToggleIcon = document.getElementById('toggleProfileForm');

    console.log("DOMContentLoaded event fired");

    if (profileForm && profileCard && profileLink && profileToggleIcon) {
        profileLink.addEventListener("click", function(event) {
            console.log("profileLink click event fired");
            event.preventDefault();  // Prevenir la redirección
            profileCard.classList.remove('hidden');
        });

        profileToggleIcon.addEventListener("click", function() {
            console.log("profileToggleIcon click event fired");
            profileCard.classList.toggle('hidden');
        });

        window.addEventListener("click", function(event) {
            console.log("window click event fired");
            if (event.target === profileCard) {
                profileCard.classList.add('hidden');
            }
        });
    }
});
