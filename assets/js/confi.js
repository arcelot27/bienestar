function openeditModal(event) {
    event.preventDefault();
    document.getElementById('editModal').style.display = 'block';
}

function closeeditModal() {
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('editModal');
    if (event.target === modal) {
        closeeditModal();
    }
}