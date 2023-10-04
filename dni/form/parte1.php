 
        <div class="container mt-5">
  
        <div style="display: flex; align-items: center; justify-content: center; text-align: center;" class="titulo-3d">   
            <h1 data-aos="flip-left" >Datos Generales</h1>
            <img src="./img/logo.png" alt="Imagen" style="width: 100px; height: 100px; ">
        </div>



<form id="formulario1">

            <div class="row">
            <iframe src="https://www.google.com/maps/d/embed?mid=12TVZOl-CrMXC3JVSkjzizErwNN2Jtg2s&ehbc=2E312F" width="1280" height="480"></iframe>
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
                        mensajeTexto.textContent = 'Tiene 2,  👩‍👦👶';
                        break;
                    case 3:
                        mensajeTexto.textContent = 'Tiene 3, 👶👶👶';
                        break;
                    case 4:
                        mensajeTexto.textContent = 'Tiene 4 👶👶👶👶';
                        break;
                    case 5:
                        mensajeTexto.textContent = 'Tiene 5 👶👶👶👶👶';
                        break;
                    case 6:
                        mensajeTexto.textContent = 'Tiene 6 👶👶👶👶👶👶';
                        break;
                    case 7:
                        mensajeTexto.textContent = 'Tiene 7 👶👶👶👶👶👶👶';
                        break;
                    default:
                        mensajeTexto.textContent = 'Tiene 8';
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

                    var apellidos_nombre = $('#apellidos_nombre').val();
                    var fecha = $('#fecha').val();
                    var institucion = $('#institucion').val();
                    var distrito = $('#distrito').val();
                    var provincia = $('#provincia').val();
                    var departamento = $('#departamento').val();
                    var rango_edad = $('#rango_edad').val();
                    var documento_identidad = $('#documento_identidad').val();
                    var dni = $('#dni').val();
                    var extranjero = $('#extranjero').val();
                    var numero_hijos = $('#numero_hijos').val();
                    var ocupacion_victima = $('#ocupacion_victima').val();
                    var discapacidad = $('input[name="discapacidad"]:checked').val();
                    var tipo_discapacidad = $('input[name="tipo_discapacidad"]:checked').val();
                    var lengua_materna = $('#lengua_materna').val();
                    var lenguaje_senas = $('input[name="lenguaje_senas"]:checked').val();
                    var identidad_etnica = $('#identidad_etnica').val();

                     // Realiza las validaciones aquí
                    var errores = [];

                    // Ejemplo de validación de campos obligatorios
                    if (apellidos_nombre === "") {
                        errores.push("El campo 'Apellidos y Nombre' es obligatorio.");
                    }
                    if (fecha === "") {
                        errores.push("El campo 'Fecha' es obligatorio.");
                    }

                    // Ejemplo de validación de rango de edad
                    if (rango_edad < 0 || rango_edad > 100) {
                        errores.push("El rango de edad debe estar entre 0 y 100.");
                    }

                    // Ejemplo de validación de número de hijos
                    if (isNaN(numero_hijos) || numero_hijos < 0) {
                        errores.push("El número de hijos debe ser un valor válido.");
                    }

                    // Ejemplo de validación de formato de DNI
                    if (documento_identidad === "DNI" && !(/^\d{8}$/.test(dni))) {
                        errores.push("El número de DNI debe contener 8 dígitos.");
                    }

                    // Ejemplo de validación de formato de Carné de Extranjería
                    if (documento_identidad === "Carné de Extranjería" && !(/^\d{9}$/.test(extranjero))) {
                        errores.push("El número de Carné de Extranjería debe contener 9 dígitos.");
                    }

                    // Ejemplo de validación de ocupación
                    if (ocupacion_victima === "") {
                        errores.push("El campo 'Ocupación de la víctima' es obligatorio.");
                    }

                    // Ejemplo de validación de tipo de discapacidad (debes tener al menos una seleccionada)
                    if (!$('input[name="tipo_discapacidad"]').is(':checked')) {
                        errores.push("Debes seleccionar al menos un tipo de discapacidad.");
                    }

                    // Ejemplo de validación de lengua materna (debes tener al menos una seleccionada)
                    if ($('#lengua_materna').val() === null) {
                        errores.push("Debes seleccionar al menos una lengua materna.");
                    }

                    // Ejemplo de validación de identidad étnica (debes tener al menos una seleccionada)
                    if ($('#identidad_etnica').val() === null) {
                        errores.push("Debes seleccionar al menos una identidad étnica.");
                    }

                    if (errores.length > 0) {
                        // Si hay errores, muestra una alerta con los mensajes de error
                        alert("Por favor, corrige los siguientes errores:\n" + errores.join("\n"));
                    } else {
                        // Si todo es válido, envía el formulario
                    

                    $.ajax({
                        type: "POST",
                        url: "datosformulario1.php",
                        data: $(this).serialize(),
                        success: function(response) {
                        $("#parte1").html(response);
                     }
                    });
                   }
                });
            });

        </script>