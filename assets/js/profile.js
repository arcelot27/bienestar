document.addEventListener("DOMContentLoaded", function() {
    const profileForm = document.getElementById("profileForm");
    const profileCard = document.querySelector('.profile-card');
    const profileLink = document.getElementById('profileLink');
    const toggleProfileForm = document.getElementById('toggleProfileForm');

    if (profileLink) {
        profileLink.addEventListener("click", function(event) {
            event.preventDefault();
            profileCard.classList.remove('hidden');
            profileCard.style.display = 'block';
        });
    }

    if (toggleProfileForm) {
        toggleProfileForm.addEventListener("click", function() {
            profileCard.classList.add('hidden');
            profileCard.style.display = 'none';
        });
    }

    window.addEventListener("click", function(event) {
        if (!profileCard.contains(event.target) && !profileLink.contains(event.target)) {
            profileCard.classList.add('hidden');
            profileCard.style.display = 'none';
        }
    });

    if (profileForm) {
        profileForm.addEventListener("submit", function(event) {
            event.preventDefault();

            fetch('?b=enfermeria&s=updateUser', {
                method: 'POST',
                body: new FormData(profileForm)
            })
            .then(response => response.json())
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

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
   
const type = password.getAttribute("type") === "password" ? "text" : "password";
password.setAttribute("type", type);

this.classList.toggle('fa-eye');
});