function openeditModal(event) {
    event.preventDefault();
    document.getElementById('editModal').style.display = 'flex';
}

function closeeditModal() {
    document.getElementById('editModal').style.display = 'none';
}

window.onclick = function (event) {
    if (event.target == document.getElementById('editModal')) {
        closeeditModal();
    }
}