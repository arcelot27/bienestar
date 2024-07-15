<main class="container mb-3">
    <div class="main_header mt-3 position-relative">
        <div class="row align-items-center">
            <div class="col-md-2  text-center ">
                <a href="?b=psicol" style="font-size: 24pt"><i class="fas fa-circle-chevron-left"></i></a>
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
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=buspsico" novalidate>
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
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=buspsico" novalidate>
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
                    <form class="row g-3 needs-validation" method="POST" action="?b=tamiz&s=buspsico" novalidate>
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

                <div class="col-md-6 text-center">
                    <form action="?b=Tamiz&s=exportarDatosPsico" method="post">
                        <input type="hidden" name="datos_exportar" value="<?= htmlspecialchars(json_encode($datos)) ?>">
                        <button type="submit" class="btn btn-primary">Exportar a Excel</button>
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
                        <th>Numero de Ficha</th>
                        <th>Jornada</th>
                        <th>ID Tamiz</th>
                        <th>Nombre Tamiz</th>
                        <th>Sustancia psicoactiva</th>
                        <th>Cuáles Sustancia psicoactiva</th>
                        <th>Alcohol</th>
                        <th>Enfermedad Mental</th>
                        <th>Tristeza Último Mes</th>
                        <th>Por qué Tristeza</th>
                        <th>Con Quién Vive</th>
                        <th>Relación con Personas</th>
                        <th>Medio de Transporte</th>
                        <th>Otro Medio de Transporte</th>
                        <th>Origen de Ingresos</th>
                        <th>Otro Origen de Ingresos</th>
                        <th>Apoyo Familiar</th>
                        <th>Tipo de Apoyo</th>
                        <th>Dificultad Último Mes</th>
                        <th>Cuáles Dificultades</th>
                        <th>Ayuda en Problema</th>
                        <th>Otra Ayuda</th>
                        <th>Aprobación de Padres</th>
                        <th>Satisfacción con Titulación</th>
                        <th>Por qué Satisfacción</th>
                        <th>Dificultad de Adaptación</th>
                        <th>Relación con Instructores</th>
                        <th>Relación con Compañeros</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($datos)) : ?>
                        <?php foreach ($datos as $aprendiz) : ?>
                            <?php
                            if (empty($aprendiz['tamiz_psico'])) {
                                $aprendiz['tamiz_psico'] = [array_fill_keys([
                                    'id_taz', 'name_taz', 'sustancias_psicoactivas_taz', 'sustancias_psicoactivas_cual_taz',
                                    'bebidas_alcoholicas_taz', 'enfermedad_mental_taz', 'triste_ultimo_mes_taz',
                                    'triste_ultimo_mes_por_que_taz', 'con_quien_vive_taz', 'relacion_personas_taz', 'medio_transporte_taz',
                                    'medio_transporte_otro_taz', 'origen_ingresos_taz', 'origen_ingresos_otro_taz', 'apoyo_familiar_taz',
                                    'tipo_apoyo_taz', 'dificultad_ultimo_mes_taz', 'dificultad_ultimo_mes_cual_taz', 'ayuda_problema_taz',
                                    'ayuda_problema_otro_taz', 'aprobacion_padres_taz', 'satisfaccion_titulacion_taz',
                                    'satisfaccion_titulacion_por_que_taz', 'dificultad_adaptarse_taz', 'interrelacion_instructores_taz',
                                    'relacion_compañeros_taz', 'observaciones_taz'
                                ], '')];
                            }
                            ?>

                            <?php foreach ($aprendiz['tamiz_psico'] as $tamiz) : ?>
                                <tr>
                                    <td><?= isset($aprendiz['name_apre']) ? $aprendiz['name_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['dni_apre']) ? $aprendiz['dni_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['numero_ficha_apre']) ? $aprendiz['numero_ficha_apre'] : ''; ?></td>
                                    <td><?= isset($aprendiz['jornada_apre']) ? $aprendiz['jornada_apre'] : ''; ?></td>
                                    <td><?= isset($tamiz['id_taz']) ? $tamiz['id_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['name_taz']) ? $tamiz['name_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sustancias_psicoactivas_taz']) ? $tamiz['sustancias_psicoactivas_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['sustancias_psicoactivas_cual_taz']) ? $tamiz['sustancias_psicoactivas_cual_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['bebidas_alcoholicas_taz']) ? $tamiz['bebidas_alcoholicas_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['enfermedad_mental_taz']) ? $tamiz['enfermedad_mental_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['triste_ultimo_mes_taz']) ? $tamiz['triste_ultimo_mes_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['triste_ultimo_mes_por_que_taz']) ? $tamiz['triste_ultimo_mes_por_que_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['con_quien_vive_taz']) ? $tamiz['con_quien_vive_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['relacion_personas_taz']) ? $tamiz['relacion_personas_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['medio_transporte_taz']) ? $tamiz['medio_transporte_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['medio_transporte_otro_taz']) ? $tamiz['medio_transporte_otro_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['origen_ingresos_taz']) ? $tamiz['origen_ingresos_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['origen_ingresos_otro_taz']) ? $tamiz['origen_ingresos_otro_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['apoyo_familiar_taz']) ? $tamiz['apoyo_familiar_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['tipo_apoyo_taz']) ? $tamiz['tipo_apoyo_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['dificultad_ultimo_mes_taz']) ? $tamiz['dificultad_ultimo_mes_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['dificultad_ultimo_mes_cual_taz']) ? $tamiz['dificultad_ultimo_mes_cual_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['ayuda_problema_taz']) ? $tamiz['ayuda_problema_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['ayuda_problema_otro_taz']) ? $tamiz['ayuda_problema_otro_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['aprobacion_padres_taz']) ? $tamiz['aprobacion_padres_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['satisfaccion_titulacion_taz']) ? $tamiz['satisfaccion_titulacion_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['satisfaccion_titulacion_por_que_taz']) ? $tamiz['satisfaccion_titulacion_por_que_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['dificultad_adaptarse_taz']) ? $tamiz['dificultad_adaptarse_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['interrelacion_instructores_taz']) ? $tamiz['interrelacion_instructores_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['relacion_compañeros_taz']) ? $tamiz['relacion_compañeros_taz'] : ''; ?></td>
                                    <td><?= isset($tamiz['observaciones_taz']) ? $tamiz['observaciones_taz'] : ''; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="31">No hay datos disponibles</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</main>