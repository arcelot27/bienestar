<div class="main_header mt-3 ms-3">
        <a href="?b=apren"><i class="fas fa-circle-chevron-left"></i></a>
    </div>
    <main class="main_body">
        <div class="container">
            <form name="tamizajeForm" action="?b=apren&s=guardarAprendiz" method="post" onsubmit="return confirmarInscripcion()">
                <div class="form-group">
                    <label for="nombre">1. Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">2. Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento">3. Tipo de Documento</label>
                    <select class="form-control" name="tipoDocumento" required>
                        <option value="">Seleccione</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="TI">Tarjeta de Identidad</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="PASAPORTE">Pasaporte</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numeroDocumento">4. Número de Documento</label>
                    <input type="text" class="form-control" name="numeroDocumento" required>
                </div>
                <div class="form-group">
                    <label for="edad">5. Edad</label>
                    <input type="number" class="form-control" name="edad" required>
                </div>
                <div class="form-group">
                    <label for="estadoCivil">6. Estado Civil</label>
                    <select class="form-control" name="estadoCivil" required>
                        <option value="">Seleccione</option>
                        <option value="CASADO(A)">Casado(a)</option>
                        <option value="SOLTERO(A)">Soltero(a)</option>
                        <option value="UNION LIBRE">Unión Libre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sexo">7. Sexo</label>
                    <select class="form-control" name="sexo" required>
                        <option value="">Seleccione</option>
                        <option value="FEMENINO">Femenino</option>
                        <option value="MASCULINO">Masculino</option>
                        <option value="IDENTIDAD DE GÉNERO">Identidad de Género</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="identidadGenero">8. Si su respuesta es "Identidad de Género", escriba cuál</label>
                    <input type="text" class="form-control" name="identidadGenero">
                </div>
                <div class="form-group">
                    <label for="grupoEtnico">9. ¿Pertenece a algún grupo étnico?</label>
                    <select class="form-control" name="grupoEtnico" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="grupoEtnicoCual">10. Si su anterior respuesta fue "sí", escriba a qué grupo étnico pertenece</label>
                    <input type="text" class="form-control" name="grupoEtnicoCual">
                </div>
                <div class="form-group">
                    <label for="estrato">11. Estrato</label>
                    <select class="form-control" name="estrato" required>
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="NO SABE">No sabe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="zonaResidencia">12. Reside en una zona</label>
                    <select class="form-control" name="zonaResidencia" required>
                        <option value="">Seleccione</option>
                        <option value="RURAL">Rural</option>
                        <option value="URBANA">Urbana</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lugarResidencia">13. Lugar de Residencia</label>
                    <input type="text" class="form-control" name="lugarResidencia" required>
                </div>
                <div class="form-group">
                    <label for="vivienda">14. Cuenta con vivienda</label>
                    <select class="form-control" name="vivienda" required>
                        <option value="">Seleccione</option>
                        <option value="PROPIA">Propia</option>
                        <option value="ARRENDADA">Arrendada</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>15. ¿Con qué servicios públicos cuenta?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="energia" value="ENERGIA">
                        <label class="form-check-label" for="energia">
                            Energía
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="gas" value="GAS">
                        <label class="form-check-label" for="gas">
                            Gas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="agua" value="AGUA">
                        <label class="form-check-label" for="agua">
                            Agua
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="alcantarillado" value="ALCANTARILLADO">
                        <label class="form-check-label" for="alcantarillado">
                            Alcantarillado
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="internet" value="INTERNET">
                        <label class="form-check-label" for="internet">
                            Internet
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ser_publico[]"  id="ninguno" value="NINGUNO">
                        <label class="form-check-label" for="ninguno">
                            Ninguno
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>16. ¿En qué ocupa su tiempo libre?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre1" value="PASAR TIEMPO EN FAMILIA">
                        <label class="form-check-label" for="tiempoLibre1">
                            Pasar tiempo en familia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre2" value="ESTUDIAR">
                        <label class="form-check-label" for="tiempoLibre2">
                            Estudiar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre3" value="JUGAR">
                        <label class="form-check-label" for="tiempoLibre3">
                            Jugar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre4" value="TRABAJAR">
                        <label class="form-check-label" for="tiempoLibre4">
                            Trabajar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre5" value="LABORES DOMESTICAS">
                        <label class="form-check-label" for="tiempoLibre5">
                            Labores domésticas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre6" value="RECREACION">
                        <label class="form-check-label" for="tiempoLibre6">
                            Recreación
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tiempoLibre[]" id="tiempoLibre7" value="NINGUNA">
                        <label class="form-check-label" for="tiempoLibre7">
                            Ninguna
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hijos">17. ¿Tiene hijos?</label>
                    <input type="number" class="form-control" name="hijos" required>
                </div>
                <div class="form-group">
                    <label for="embarazo">18. ¿Se encuentra en embarazo?</label>
                    <select class="form-control" name="embarazo" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="controlesPrenatales">19. Si su anterior respuesta fue "sí", ¿ya inició controles prenatales?</label>
                    <select class="form-control" name="controlesPrenatales" >
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoMedico">20. ¿Tiene algún diagnóstico médico?</label>
                    <select class="form-control" name="diagnosticoMedico" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diagnosticoMedicoCual">21. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" name="diagnosticoMedicoCual">
                </div>
                <div class="form-group">
                    <label for="medicamento">22. ¿Toma algún medicamento?</label>
                    <select class="form-control" name="medicamento" required>
                        <option value="">Seleccione</option>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="medicamentoCual">23. Si su anterior respuesta fue "sí", escriba cuál</label>
                    <input type="text" class="form-control" name="medicamentoCual">
                </div>
                <div class="form-group">
                    <label>24. ¿Tiene alguna de las siguientes limitaciones o discapacidad?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones1" value="MOTORA">
                        <label class="form-check-label" for="limitaciones1">
                            Motora
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones2" value="AUDITIVA">
                        <label class="form-check-label" for="limitaciones2">
                            Auditiva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones3" value="VISUAL">
                        <label class="form-check-label" for="limitaciones3">
                            Visual
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones4" value="COGNITIVA">
                        <label class="form-check-label" for="limitaciones4">
                            Cognitiva
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones5" value="MENTAL">
                        <label class="form-check-label" for="limitaciones5">
                            Mental
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones6" value="MULTIPLE">
                        <label class="form-check-label" for="limitaciones6">
                            Múltiple
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones7" value="SORDOCEGUERA">
                        <label class="form-check-label" for="limitaciones7">
                            Sordoceguera
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="limitaciones[]" id="limitaciones8" value="NINGUNO">
                        <label class="form-check-label" for="limitaciones8">
                            Ninguno
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>25. ¿Conoce alguno de estos antecedentes en su familia?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes2" value="DIABETES">
                        <label class="form-check-label" for="antecedentes1">
                            Diabetes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes2" value="HIPERTENSION ARTERIAL">
                        <label class="form-check-label" for="antecedentes2">
                            Hipertensión arterial
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes3" value="CANCER">
                        <label class="form-check-label" for="antecedentes3">
                            Cáncer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes4" value="ENFERMEDAD PULMONAR">
                        <label class="form-check-label" for="antecedentes4">
                            Enfermedad pulmonar (trombosis)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes5" value="ENFERMEDADES MENTALES">
                        <label class="form-check-label" for="antecedentes5">
                            Enfermedades mentales
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes6" value="NINGUNA">
                        <label class="form-check-label" for="antecedentes6">
                            Ninguna
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="antecedentes-familia[]" id="antecedentes7" value="OTRA">
                        <label class="form-check-label" for="antecedentes7">
                            Otra
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="antecedentesFamiliaOtra">26. Si su anterior respuesta fue "otra", indique cuál</label>
                    <input type="text" class="form-control" name="antecedentesFamiliaOtra">
                </div>
                <div class="form-group">
                    <label for="numeroCelular">27. Número de Celular</label>
                    <input type="number" class="form-control" name="numeroCelular" required>
                </div>
                <div class="form-group">
                    <label for="correo">28. Correo Electrónico</label>
                    <input type="email" class="form-control" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="numeroFicha">29. Número de Ficha</label>
                    <input type="number" class="form-control" name="numeroFicha" required>
                </div>
                <div class="form-group">
                    <label for="jornada">30. Jornada</label>
                    <select class="form-control" name="jornada" required>
                        <option value="">Seleccione</option>
                        <option value="Mañana">Mañana</option>
                        <option value="Tarde">Tarde</option>
                        <option value="NOCTURNA">Nocturna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contactoEmergencia">31. Contacto de Emergencia</label>
                    <input type="text" class="form-control" name="contactoEmergencia" required>
                </div>
                <div class="form-group">
                    <label for="numeroContactoEmergencia">32. Número de Contacto de Emergencia</label>
                    <input type="number" class="form-control" name="numeroContactoEmergencia" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-primary">Cancelar</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        function confirmarInscripcion() {
            return confirm('¿Está seguro de enviar su inscripción?');
        }
    </script>
</body>

</html>