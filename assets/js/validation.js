// Función para guardar los valores del formulario en el almacenamiento local
function saveForm() {
    var formData = {};
    var inputs = document.querySelectorAll('input');
    inputs.forEach(function(input) {
        formData[input.id] = input.value;
    });
    localStorage.setItem('formData', JSON.stringify(formData));
}

// Función para cargar los valores guardados del formulario desde el almacenamiento local
function loadForm() {
    var formData = JSON.parse(localStorage.getItem('formData'));
    if (formData) {
        Object.keys(formData).forEach(function(key) {
            var input = document.getElementById(key);
            if (input) {
                input.value = formData[key];
                // Agregar estilo de validación al cargar los datos del formulario
                if (input.value.trim() === '') {
                    input.classList.add('is-invalid');
                }
            }
        });
    }
}

// Función para limpiar el formulario y los datos guardados en el almacenamiento local
function clearForm() {
    localStorage.removeItem('formData');
}

// Cargar el formulario guardado cuando la página se cargue
window.onload = function() {
    loadForm();
}

// Guardar el formulario cuando se envíe
document.getElementById('delegatesForm').addEventListener('submit', function() {
    saveForm();
});

// Validar los campos del formulario cuando pierden el foco
document.querySelectorAll('input').forEach(function(input) {
    input.addEventListener('blur', function() {
        if (this.checkValidity()) {
            this.classList.remove('is-invalid');
        } else {
            this.classList.add('is-invalid');
        }
    });
});
