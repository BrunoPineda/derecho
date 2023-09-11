 
        <div class="container mt-5">
  
        <h1 data-aos="flip-left" class="titulo-3d">Datos Generales</h1>

<form id="formulario1">
            <div class="row">
                <div data-aos="fade-up-right" class="col-md-6 form-group">
                    <label for="apellidos_nombre">APELLIDOS Y NOMBRE DE LA VÍCTIMA:</label>
                    <input type="text" class="form-control" id="apellidos_nombre" name="apellidos_nombre">
                </div>
                <div data-aos="fade-up-right" class="col-md-6 form-group">
                    <label for="fecha">FECHA:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
            </div>
            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="institucion">INSTITUCIÓN (Comisaria, Ministerio Publico, Poder Judicial):</label>
                        <textarea class="form-control" id="institucion" name="institucion" style="height: 200px;">San Juan De Miraflores</textarea>
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <!-- Segunda parte en bloque -->
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="distrito">DISTRITO:</label>
                        <input type="text" class="form-control" id="distrito" name="distrito" value="San Juan De Miraflores">
                    </div>
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="provincia">PROVINCIA:</label>
                        <input type="text" class="form-control" id="provincia" name="provincia"  value="Lima">
                    </div>
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="departamento">DEPARTAMENTO:</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" value="Lima">
                    </div>
                </div>
            </div>

            <div data-aos="fade-up-right" class="form-group">
                <label for="rango_edad">RANGO DE EDAD:</label>
                <div class="d-flex align-items-center">
                    <input type="range" class="form-control-range" id="rango_edad" name="rango_edad" min="0" max="100" step="1" value="0">
                    <span class="ml-3" id="edad_seleccionada"  style="font-size: 1.2em;">0 años</span>
                </div>
            </div>
            <script>
                document.getElementById('rango_edad').addEventListener('input', function() {
                    var edadSeleccionada = this.value;
                    document.getElementById('edad_seleccionada').textContent = edadSeleccionada + ' años';
                });
            </script>
            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="documento_identidad">DOCUMENTO DE IDENTIDAD:</label>
                        <select class="form-control" id="documento_identidad" name="documento_identidad">
                            <option value="DNI">DNI</option>
                            <option value="Carné de Extranjería">Carné de Extranjería</option>
                            <option value="No tiene">No tiene</option>
                            <option value="No lo lleva consigo">No lo lleva consigo y no recuerda el número</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <!-- Input para DNI -->
                    <div data-aos="fade-up-right" class="form-group" id="dni_input" style="display: none;">
                        <label for="dni">Número de DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni">
                    </div>

                    <!-- Input para Carné de Extranjería -->
                    <div data-aos="fade-up-right" class="form-group" id="extranjero_input" style="display: none;">
                        <label for="extranjero">Número de Carné de Extranjería:</label>
                        <input type="text" class="form-control" id="extranjero" name="extranjero">
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('documento_identidad').addEventListener('change', function() {
                var dniInput = document.getElementById('dni_input');
                var extranjeroInput = document.getElementById('extranjero_input');

                if (this.value == 'DNI') {
                    dniInput.style.display = 'block';
                    extranjeroInput.style.display = 'none';
                } else if (this.value == 'Carné de Extranjería') {
                    dniInput.style.display = 'none';
                    extranjeroInput.style.display = 'block';
                } else {
                    dniInput.style.display = 'none';
                    extranjeroInput.style.display = 'none';
                }
            });
            </script>

            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="numero_hijos">Número de hijos/as menores:</label>
                        <input type="number" class="form-control" id="numero_hijos" name="numero_hijos" min="0">
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group" id="mensaje_hijos">
                        <label>Mensaje:</label>
                        <span id="mensaje_texto">Sin hijos</span>
                    </div>
                </div>
            </div>

            <script>
            document.getElementById('numero_hijos').addEventListener('input', function() {
                var numeroHijos = parseInt(this.value);
                var mensajeTexto = document.getElementById('mensaje_texto');

                switch (numeroHijos) {
                    case 0:
                        mensajeTexto.textContent = 'Sin hijos';
                        break;
                    case 1:
                        mensajeTexto.textContent = 'Tiene un solo hijo, está bien👩‍🍼';
                        break;
                    case 2:
                        mensajeTexto.textContent = 'Tiene 2, es aceptable 👩‍👦👶';
                        break;
                    case 3:
                        mensajeTexto.textContent = 'Tiene 3, ya es considerable 👶👶👶';
                        break;
                    case 4:
                        mensajeTexto.textContent = 'Tiene un grupo de hijos 👶👶👶👶';
                        break;
                    case 5:
                        mensajeTexto.textContent = 'Le gusta tener muchos hijos 👶👶👶👶👶';
                        break;
                    case 6:
                        mensajeTexto.textContent = 'Tiene media docena de hijos 👶👶👶👶👶👶';
                        break;
                    case 7:
                        mensajeTexto.textContent = 'Demasiados hijos, se ve una falta de educación sexual 👶👶👶👶👶👶👶';
                        break;
                    default:
                        mensajeTexto.textContent = 'Esta señora es coneja 🐰';
                }
            });
            </script>

            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group">
                        <label>Ocupación de la víctima:</label>
                        <input type="text" class="form-control" id="ocupacion_victima" name="ocupacion_victima">
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <div data-aos="fade-up-right" class="form-group">
                        <label>¿La víctima está en una situación de discapacidad?</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="discapacidad" id="si_discapacidad" value="si">
                            <label class="form-check-label" for="si_discapacidad">Sí 👩‍🦽</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="discapacidad" id="no_discapacidad" value="no" checked>
                            <label class="form-check-label" for="no_discapacidad">No</label>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up-right" class="form-group">
                <label>¿Qué tipo de discapacidad tiene?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="fisica" name="tipo_discapacidad" value="fisica">
                    <label class="form-check-label" for="fisica">Física</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="psicosocial" name="tipo_discapacidad" value="psicosocial">
                    <label class="form-check-label" for="psicosocial">Psicosocial</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="visual" name="tipo_discapacidad" value="visual">
                    <label class="form-check-label" for="visual">Visual</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="intelectual" name="tipo_discapacidad" value="intelectual">
                    <label class="form-check-label" for="intelectual">Intelectual</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="auditiva" name="tipo_discapacidad" value="auditiva">
                    <label class="form-check-label" for="auditiva">Auditiva</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="sordo_aciego" name="tipo_discapacidad" value="sordo_aciego">
                    <label class="form-check-label" for="sordo_aciego">Sordo/a-ciego/a</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="mudo" name="tipo_discapacidad" value="mudo">
                    <label class="form-check-label" for="mudo">Mudo/a</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ninguno" name="tipo_discapacidad" value="ninguno" checked>
                    <label  class="form-check-label" for="ninguno">ninguno</label>
                </div>

            </div>

            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-4">
                    <div data-aos="fade-up-right" class="form-group">
                        <label>Lengua Materna:</label>
                        <select class="form-control" id="lengua_materna" name="lengua_materna">
                            <option value="Castellano">Castellano</option>
                            <option value="Quechua">Quechua</option>
                            <option value="Aymara">Aymara</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-4">
                    <div data-aos="fade-up-right" class="form-group">
                        <label>Lenguaje de Señas (Ley Osi O No 29535):</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lenguaje_senas" id="si_lenguaje_senas" value="si">
                            <label class="form-check-label" for="si_lenguaje_senas">Sí</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="lenguaje_senas" id="no_lenguaje_senas" value="no" checked>
                            <label class="form-check-label" for="no_lenguaje_senas">No</label>
                        </div>
                    </div>
                </div>

                <!-- Tercera columna -->
                <div class="col-md-4">
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="identidad_etnica">Identidad Étnica:</label>
                        <select class="form-control" id="identidad_etnica" name="identidad_etnica">
                            <option value="mestizo">Mestizo</option>
                            <option value="indígena">Indígena</option>
                            <option value="afrodescendiente">Afrodescendiente</option>
                            <option value="blanco">Blanco</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <div id="parte1"></div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#formulario1").submit(function(event) {
                    event.preventDefault(); // Previene el comportamiento predeterminado del formulario

                    $.ajax({
                        type: "POST",
                        url: "datosformulario1.php",
                        data: $(this).serialize(),
                        success: function(response) {
                        $("#parte1").html(response);
}
                    });
                });
            });

        </script>