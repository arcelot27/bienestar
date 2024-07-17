<?php if (isset($usuario) && is_array($usuario)) : ?>
    <div class="main_header mt-3 ms-3">
        <a href="?b=tamiz&s=devol"><i class="fas fa-circle-chevron-left"></i></a>
    </div>
    <main class="main_body">
        <div class="container">
            <form name="tamizajeForm" method="post" action="?b=tamiz&s=guardarDatosActualizados">
                <input type="hidden" name="id_apre" value="<?php echo $usuario['id_apre']; ?>">
                <div class="form-group">
                    <label for="name_apre">1. Nombre</label>
                    <input type="text" class="form-control" name="name_apre" value="<?php echo $usuario['name_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="ape_apre">2. Apellidos</label>
                    <input type="text" class="form-control" name="ape_apre" value="<?php echo $usuario['ape_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tipo_docu_apre">3. Tipo de Documento</label>
                    <select class="form-control" name="tipo_docu_apre" required>
                        <option value="">Seleccione</option>
                        <option value="CC" <?php if ($usuario['tipo_docu_apre'] == 'CC') echo 'selected'; ?>>Cédula de Ciudadanía</option>
                        <option value="TI" <?php if ($usuario['tipo_docu_apre'] == 'TI') echo 'selected'; ?>>Tarjeta de Identidad</option>
                        <option value="CE" <?php if ($usuario['tipo_docu_apre'] == 'CE') echo 'selected'; ?>>Cédula de Extranjería</option>
                        <option value="PASAPORTE" <?php if ($usuario['tipo_docu_apre'] == 'PASAPORTE') echo 'selected'; ?>>Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dni_apre">4. Número de Documento</label>
                    <input type="text" class="form-control" name="dni_apre" value="<?php echo $usuario['dni_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="edad_apre">5. Edad</label>
                    <input type="number" class="form-control" name="edad_apre" value="<?php echo $usuario['edad_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="esta_civil_apre">6. Estado Civil</label>
                    <input type="text" class="form-control" name="esta_civil_apre" value="<?php echo $usuario['esta_civil_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="sexo_apre">7. Sexo</label>
                    <input type="text" class="form-control" name="sexo_apre" value="<?php echo $usuario['sexo_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="iden_gene_apre">8. Si su respuesta es "Identidad de Género", escriba cuál</label>
                    <input type="text" class="form-control" name="iden_gene_apre" value="<?php echo $usuario['iden_gene_apre']; ?>">
                </div>
                <div class="form-group">
                    <label for="grup_etn_apre">9. ¿Pertenece a algún grupo étnico?</label>
                    <input type="text" class="form-control" name="grup_etn_apre" value="<?php echo $usuario['grup_etn_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="grup_etn_cual_apre">10. Si su anterior respuesta fue "sí", escriba a qué grupo étnico pertenece</label>
                    <input type="text" class="form-control" name="grup_etn_cual_apre" value="<?php echo $usuario['grup_etn_cual_apre']; ?>">
                </div>
                <div class="form-group">
                    <label for="estrato">11. Estrato</label>
                    <select class="form-control" name="estr_apre" required>
                        <option value="">Seleccione</option>
                        <option value="1" <?php if ($usuario['estr_apre'] == 1) echo 'selected'; ?>>1</option>
                        <option value="2" <?php if ($usuario['estr_apre'] == 2) echo 'selected'; ?>>2</option>
                        <option value="3" <?php if ($usuario['estr_apre'] == 3) echo 'selected'; ?>>3</option>
                        <option value="4" <?php if ($usuario['estr_apre'] == 4) echo 'selected'; ?>>4</option>
                        <option value="5" <?php if ($usuario['estr_apre'] == 5) echo 'selected'; ?>>5</option>
                        <option value="NO SABE" <?php if ($usuario['estr_apre'] == 'NO SABE') echo 'selected'; ?>>No sabe</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="zonaResidencia">12. Reside en una zona</label>
                    <select class="form-control" name="zona_resi_apre" required>
                        <option value="">Seleccione</option>
                        <option value="RURAL" <?php if ($usuario['zona_resi_apre'] == 'RURAL') echo 'selected'; ?>>Rural</option>
                        <option value="URBANA" <?php if ($usuario['zona_resi_apre'] == 'URBANA') echo 'selected'; ?>>Urbana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lugar_resi_apre">13. Lugar de Residencia</label>
                    <input type="text" class="form-control" name="lugar_resi_apre" value="<?php echo $usuario['lugar_resi_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="vivienda">14. Cuenta con vivienda</label>
                    <select class="form-control" name="vivie_apre" required>
                        <option value="">Seleccione</option>
                        <option value="PROPIA" <?php if ($usuario['vivie_apre'] == 'PROPIA') echo 'selected'; ?>>Propia</option>
                        <option value="ARRENDADA" <?php if ($usuario['vivie_apre'] == 'ARRENDADA') echo 'selected'; ?>>Arrendada</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="servicios_publicos_apre">15. Servicios Públicos (colocar como aparece a continuacion [ENERGIA,GAS,AGUA,ALCANTARILLADO,INTERNET])</label>
                    <textarea class="form-control" name="servicios_publicos_apre"><?php echo $usuario['servicios_publicos_apre']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>16. ¿En qué ocupa su tiempo libre? (colocar como aparece a continuacion [PASAR TIEMPO EN FAMILIA,ESTUDIAR,JUGAR,TRABAJAR,LABORES DOMÉSTICAS,RECREACIÓN, NINGUNA])</label>
                    <textarea class="form-control" name="tiempo_libre_apre"><?php echo $usuario['tiempo_libre_apre']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="hijos_apre">17. Número de Hijos</label>
                    <input type="number" class="form-control" name="hijos_apre" value="<?php echo $usuario['hijos_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="embarazo">18. ¿Se encuentra en embarazo?</label>
                    <select class="form-control" name="embarazo_apre" required>
                        <option value="">Seleccione</option>
                        <option value="SI" <?php if ($usuario['embarazo_apre'] === 'SI') echo 'selected'; ?>>Sí</option>
                        <option value="NO" <?php if ($usuario['embarazo_apre'] === 'NO') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="controlesPrenatales">19. Si su anterior respuesta fue "sí", ¿ya inició controles prenatales?</label>
                    <select class="form-control" name="control_prenatal_apre">
                        <option value="">Seleccione</option>
                        <option value="SI" <?php if ($usuario['control_prenatal_apre'] === 'SI') echo 'selected'; ?>>Sí</option>
                        <option value="NO" <?php if ($usuario['control_prenatal_apre'] === 'NO') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoMedico">20. ¿Tiene algún diagnóstico médico?</label>
                    <select class="form-control" name="diag_medico_apre" required>
                        <option value="">Seleccione</option>
                        <option value="SI" <?php if ($usuario['diag_medico_apre'] === 'SI') echo 'selected'; ?>>Sí</option>
                        <option value="NO" <?php if ($usuario['diag_medico_apre'] === 'NO') echo 'selected'; ?>>No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="diag_medico_cual_apre">21. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" name="diag_medico_cual_apre" value="<?php echo $usuario['diag_medico_cual_apre']; ?>">
                </div>
                <div class="form-group">
                    <label for="medicamento">22. ¿Toma algún medicamento?</label>
                    <select class="form-control" name="medica_apre" required>
                        <option value="">Seleccione</option>
                        <option value="SI" <?php if ($usuario['medica_apre'] === 'SI') echo 'selected'; ?>>Sí</option>
                        <option value="NO" <?php if ($usuario['medica_apre'] === 'NO') echo 'selected'; ?>>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medica_cual_apre">23. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" name="medica_cual_apre" value="<?php echo $usuario['medica_cual_apre']; ?>">
                </div>
                <div class="form-group">
                    <label>24. ¿Tiene alguna de las siguientes limitaciones o discapacidad? (colocar como aparece a continuacion [MOTORA,AUDITIVA,VISUAL,COGNITIVA,MENTAL,MÚLTIPLE,SORDOCEGUERA,NINGUNO])</label>
                    <textarea class="form-control" name="limitaciones_apre"><?php echo $usuario['limitaciones_apre']; ?></textarea>
                </div>

                <div class="form-group">
                    <label>25. ¿Conoce alguno de estos antecedentes en su familia? (colocar como aparece a continuacion [DIABETES,HIPERTENSIÓN ARTERIAL,CÁNCER,ENFERMEDAD PULMONAR (TROMBOSIS),ENFERMEDADES MENTALES,NINGUNA,OTRA])</label>
                    <textarea class="form-control" name="antecedentes_familiares_apre"><?php echo $usuario['antecedentes_familiares_apre']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="antecedentes_familiares_otro_apre">26. Si su anterior respuesta fue "otra", indique cuál</label>
                    <textarea class="form-control" name="antecedentes_familiares_otro_apre"><?php echo $usuario['antecedentes_familiares_otro_apre']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="numero_celular_apre">27. Número de Celular</label>
                    <input type="text" class="form-control" name="numero_celular_apre" value="<?php echo $usuario['numero_celular_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="correo_apre">28. Correo Electrónico</label>
                    <input type="email" class="form-control" name="correo_apre" value="<?php echo $usuario['correo_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="numero_ficha_apre">29. Número de Ficha</label>
                    <input type="text" class="form-control" name="numero_ficha_apre" value="<?php echo $usuario['numero_ficha_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="jornada">30. Jornada</label>
                    <select class="form-control" name="jornada_apre" required>
                        <option value="">Seleccione</option>
                        <option value="Mañana" <?php if ($usuario['jornada_apre'] === 'Mañana') echo 'selected'; ?>>Mañana</option>
                        <option value="Tarde" <?php if ($usuario['jornada_apre'] === 'Tarde') echo 'selected'; ?>>Tarde</option>
                        <option value="NOCTURNA" <?php if ($usuario['jornada_apre'] === 'NOCTURNA') echo 'selected'; ?>>Nocturna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contac_emergen_apre">31. Contacto de Emergencia</label>
                    <input type="text" class="form-control" name="contac_emergen_apre" value="<?php echo $usuario['contac_emergen_apre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="numero_contac_emergen_apre">32. Número de Contacto de Emergencia</label>
                    <input type="text" class="form-control" name="numero_contac_emergen_apre" value="<?php echo $usuario['numero_contac_emergen_apre']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </main>
<?php else : ?>
    <div class="alert alert-danger" role="alert">
        No se encontraron datos del aprendiz.
    </div>
<?php endif; ?>
<br>

<script>
    function confirmarInscripcion() {
        return confirm('¿Está seguro de actualizar los datos?');
    }
</script>
</body>

</html>