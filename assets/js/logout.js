function openModal() {
    document.getElementById('logoutModal').style.display = 'flex';
    document.body.classList.add('modal-open');
}

function closeModal() {
    document.getElementById('logoutModal').style.display = 'none';
    document.body.classList.remove('modal-open');
}

// Cerrar el modal al hacer clic fuera de la ventana modal
window.onclick = function(event) {
    if (event.target == document.getElementById('logoutModal')) {
        closeModal();
    }
}