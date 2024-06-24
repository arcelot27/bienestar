function openModal() {
    document.getElementById("logoutModal").style.display = "block";
    window.addEventListener('click', outsideClickListener);
}

function closeModal() {
    document.getElementById("logoutModal").style.display = "none";
    window.removeEventListener('click', outsideClickListener);
}

function outsideClickListener(event) {
    const modal = document.getElementById("logoutModal");
    const modalContent = document.querySelector(".modal-content");
    if (event.target === modal) {
        closeModal();
    }
}