
<main>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-6">
            <button class="btn btn-secondary" onclick="window.history.back();">
                <i class="fas fa-chevron-left"></i> Retroceder
            </button>
        </div>
        <div class="col-6 text-right">
            <button class="btn btn-primary" id="addNewRecord">
                <i class="fas fa-user-plus"></i> Agregar Nuevo Registro
            </button>
        </div>
    </div>

    <div class="search-container">
        <input type="text" id="searchJornada" class="form-control search-input" placeholder="Buscar por Jornada">
        <input type="text" id="searchFicha" class="form-control search-input" placeholder="Buscar por Ficha">
        <input type="text" id="searchDocumento" class="form-control search-input" placeholder="Buscar por Número de Documento">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="number-column">#</th>
                    <th>Jornada</th>
                    <th>Ficha</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Zona de Residencia</th>
                    <th>Lugar de Residencia</th>
                    <th>Número de Celular</th>
                    <th>Correo Electrónico</th>
                    <th>Contacto de Emergencia</th>
                    <th>Número de Contacto</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Aquí se agregarán las filas de los aprendices registrados -->
                <tr>
                    <td></td>
                    <td>Mañana</td>
                    <td>12345</td>
                    <td>Juan</td>
                    <td>Pérez</td>
                    <td>CC</td>
                    <td>1012345678</td>
                    <td>20</td>
                    <td>M</td>
                    <td>Urbana</td>
                    <td>Bogotá</td>
                    <td>3101234567</td>
                    <td>juan.perez@example.com</td>
                    <td>María Pérez</td>
                    <td>3109876543</td>
                </tr>
                <!-- Más filas según los datos disponibles -->
            </tbody>
        </table>
    </div>
</div>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script>
    function updateRowNumbers() {
        $('#tableBody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $(document).ready(function() {
        updateRowNumbers();

        $("#searchJornada").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableBody tr").filter(function() {
                $(this).toggle($(this).find("td:eq(1)").text().toLowerCase().indexOf(value) > -1);
            });
            updateRowNumbers();
        });
        
        $("#searchFicha").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableBody tr").filter(function() {
                $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
            });
            updateRowNumbers();
        });
        
        $("#searchDocumento").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tableBody tr").filter(function() {
                $(this).toggle($(this).find("td:eq(6)").text().toLowerCase().indexOf(value) > -1);
            });
            updateRowNumbers();
        });

        // Simular agregar un nuevo registro
        $("#addNewRecord").on("click", function() {
            var newRow = `<tr>
                <td></td>
                <td>Tarde</td>
                <td>67890</td>
                <td>Ana</td>
                <td>García</td>
                <td>TI</td>
                <td>1023456789</td>
                <td>22</td>
                <td>F</td>
                <td>Rural</td>
                <td>Medellín</td>
                <td>3111234567</td>
                <td>ana.garcia@example.com</td>
                <td>Pedro García</td>
                <td>3119876543</td>
            </tr>`;
            $("#tableBody").append(newRow);
            updateRowNumbers();
        });
    });
</script>

</body>
</html>
