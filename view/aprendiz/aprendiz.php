<main>
    <div class="container mt-5">    
        <div class="row mb-4">
            <div class="col-6">
                <a href="?b=apren&s=devol" class="btn btn-secondary">
                    <i class="fas fa-chevron-left"></i> Retroceder
                </a>
            </div>
            <div class="col-6 text-right">
                <a href="?b=apren&s=add" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i> Agregar Nuevo Registro
                </a>
            </div>
        </div>

        <div class="search-container mb-3">
            <input type="text" id="searchJornada" class="form-control search-input mb-2" placeholder="Buscar por Jornada">
            <input type="text" id="searchFicha" class="form-control search-input mb-2" placeholder="Buscar por Ficha">
            <input type="text" id="searchDocumento" class="form-control search-input mb-2" placeholder="Buscar por Número de Documento">
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
                    <?php
                    if (!empty($aprendices)) {
                        $number = 1;
                        foreach ($aprendices as $aprendiz) {
                            echo "<tr>";
                            echo "<td>" . $number++ . "</td>";
                            echo "<td>" . $aprendiz["jornada_apre"] . "</td>";
                            echo "<td>" . $aprendiz["numero_ficha_apre"] . "</td>";
                            echo "<td>" . $aprendiz["name_apre"] . "</td>";
                            echo "<td>" . $aprendiz["ape_apre"] . "</td>";
                            echo "<td>" . $aprendiz["tipo_docu_apre"] . "</td>";
                            echo "<td>" . $aprendiz["dni_apre"] . "</td>";
                            echo "<td>" . $aprendiz["edad_apre"] . "</td>";
                            echo "<td>" . $aprendiz["sexo_apre"] . "</td>";
                            echo "<td>" . $aprendiz["zona_resi_apre"] . "</td>";
                            echo "<td>" . $aprendiz["lugar_resi_apre"] . "</td>";
                            echo "<td>" . $aprendiz["numero_celular_apre"] . "</td>";
                            echo "<td>" . $aprendiz["correo_apre"] . "</td>";
                            echo "<td>" . $aprendiz["contac_emergen_apre"] . "</td>";
                            echo "<td>" . $aprendiz["numero_contac_emergen_apre"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>No hay registros</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    // Filtrado de la tabla
    document.getElementById('searchJornada').addEventListener('input', function() {
        filterTable(1, this.value);
    });
    document.getElementById('searchFicha').addEventListener('input', function() {
        filterTable(2, this.value);
    });
    document.getElementById('searchDocumento').addEventListener('input', function() {
        filterTable(6, this.value);
    });

    function filterTable(colIndex, filterValue) {
        const table = document.getElementById('tableBody');
        const rows = table.getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            const cellValue = cells[colIndex].textContent || cells[colIndex].innerText;
            if (cellValue.toLowerCase().indexOf(filterValue.toLowerCase()) > -1) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }
</script>