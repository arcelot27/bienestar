 // JavaScript para manejar la ventana emergente
 var modal = document.getElementById("logoutModal");
 var btn = document.getElementById("logoutButton");
 var confirmBtn = document.getElementById("confirmButton");
 var cancelBtn = document.getElementById("cancelButton");

 // Mostrar la ventana emergente al hacer clic en el botón "Cerrar Sesión"
 btn.onclick = function() {
     modal.style.display = "block";
 }

  // Redirigir a la página index.php al hacer clic en "Aceptar"
  confirmBtn.onclick = function() {
     window.location.href = "/view/index-view";
 }

 // Ocultar la ventana emergente al hacer clic en el botón "Cancelar"
 cancelBtn.onclick = function() {
     modal.style.display = "none";
 }

 // Ocultar la ventana emergente si el usuario hace clic fuera de la ventana
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }