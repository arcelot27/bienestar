<main class="container mb-3">
    <div class="main_header mt-3 position-relative">
        <div class="row align-items-center">
            <div class="col-md-2  text-center ">
                <a href="?b=depo" style="font-size: 24pt"><i class="fas fa-circle-chevron-left"></i></a>
            </div>
            <div class="col-md-2 col-7 col-md-4 text-center " style="margin-left: 12rem">
                <h3 class="mt-2">Buscar Tamizaje</h3>
            </div>
        </div>
    </div>
    <div class="main_body container mt-4 rounded p-4">
        <h5>Filtros: elija un método</h5>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=busdepo" novalidate>
                        <div class="col-12">
                            <label for="numero_documento" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" name="identificacion" id="numero_documento" placeholder="123456789" required>
                            <div class="invalid-feedback">Por favor proporcione un número de documento válido.</div>
                        </div>
                        <div class="col-12 pb-3 d-flex justify-content-between">
                            <button class="btn btn-primary" type="reset">Limpiar</button>
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=busdepo" novalidate>
                        <div class="col-12">
                            <label for="jornada_formacion" class="form-label">Jornada de Formación</label>
                            <input type="text" class="form-control" name="jornada" id="jornada_formacion" placeholder="Mañana, Tarde, Noche" required>
                            <div class="invalid-feedback">Por favor proporcione una jornada de formación válida.</div>
                        </div>
                        <div class="col-12 pb-3 d-flex justify-content-between">
                            <button class="btn btn-primary" type="reset">Limpiar</button>
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-md-6">
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=busdepo" novalidate>
                        <div class="col-12">
                            <label for="numero_ficha" class="form-label">Número de Ficha</label>
                            <input type="number" class="form-control" name="ficha" id="numero_ficha" placeholder="12345" required>
                            <div class="invalid-feedback">Por favor proporcione un número de ficha válido.</div>
                        </div>
                        <div class="col-12 pb-3 d-flex justify-content-between">
                            <button class="btn btn-primary" type="reset">Limpiar</button>
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div> <br>
        <!-- Mostrar resultados en una tabla -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Numer de Ficha</th>
                        <th>Jornada</th>
                        <th>ID Tamiz</th>
                        <th>Nombre Tamiz</th>
                        <th>Último Examen Físico</th>
                        <th>Cirugía</th>
                        <th>Cirugía Cuál</th>
                        <th>Síntomas Inusuales</th>
                        <th>Síntomas Inusuales Cuál</th>
                        <th>Convulsiones</th>
                        <th>Sustancias Psicoactivas</th>
                        <th>Sustancias Psicoactivas Cuál</th>
                        <th>Bebidas Alcohólicas</th>
                        <th>Presión Arterial</th>
                        <th>Frecuencia Cardíaca</th>
                        <th>Frecuencia Respiratoria</th>
                        <th>Saturación</th>
                        <th>Peso</th>
                        <th>Talla</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($datos)) : ?>
                        <?php foreach ($datos as $aprendiz) : ?>
                            <?php
                            if (empty($aprendiz['tamiz_salud'])) {
                                $aprendiz['tamiz_salud'] = [array_fill_keys([
                                    'id_taz', 'name_taz', 'ult_examen_fisico_taz', 'cirugia_taz', 'cirugia_cual_taz',
                                    'sintomas_inusuales_taz', 'sintomas_inusuales_cual_taz', 'convulsiones_taz',
                                    'sustancias_psicoactivas_taz', 'sustancias_psicoactivas_cual_taz', 'bebidas_alcoholicas_taz',
                                    'presion_arterial_taz', 'frecuencia_cardiaca_taz', 'frecuencia_respiratoria_taz',
                                    'saturacion_taz', 'peso_taz', 'talla_taz', 'observaciones_taz'
                                ], '')];
                            }
                            ?>

                            <?php foreach ($aprendiz['tamiz_salud'] as $tamiz) : ?>
                                <tr>
                                    <td><?= isset($aprendiz['name_apre']) ? $aprendiz['name_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['numero_ficha_apre']) ? $aprendiz['numero_ficha_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['jornada_apre']) ? $aprendiz['jornada_apre'] : ''; ?></td>
                                    <td><?= isset($tamiz['id_taz']) ? $tamiz['id_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['name_taz']) ? $tamiz['name_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['ult_examen_fisico_taz']) ? $tamiz['ult_examen_fisico_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['cirugia_taz']) ? $tamiz['cirugia_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['cirugia_cual_taz']) ? $tamiz['cirugia_cual_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sintomas_inusuales_taz']) ? $tamiz['sintomas_inusuales_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sintomas_inusuales_cual_taz']) ? $tamiz['sintomas_inusuales_cual_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['convulsiones_taz']) ? $tamiz['convulsiones_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['presion_arterial_taz']) ? $tamiz['presion_arterial_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['frecuencia_cardiaca_taz']) ? $tamiz['frecuencia_cardiaca_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['frecuencia_respiratoria_taz']) ? $tamiz['frecuencia_respiratoria_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['saturacion_taz']) ? $tamiz['saturacion_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['peso_taz']) ? $tamiz['peso_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['talla_taz']) ? $tamiz['talla_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['observaciones_taz']) ? $tamiz['observaciones_taz'] : ''; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="24">No hay datos disponibles</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>