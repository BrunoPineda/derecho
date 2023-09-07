<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Derecho informático</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<style>
        .form-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }
        
        .form-card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select {
            border: none;
            border-radius: 10px;
            padding: 10px;
            transition: box-shadow 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="tel"]:focus,
        .form-group input[type="date"]:focus,
        .form-group input[type="number"]:focus,
        .form-group select:focus {
            outline: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }
    </style>
<style>
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container-fluid h2 {
            font-size: 15vmin;
            position: absolute;
        }

        .border {
            color: black;  
            text-shadow:
                -1px -1px 0 white, 
                1px -1px 0 white,
                -1px 1px 0 white,
                1px 1px 0 white;  
        }

        .wave {
            color: #09f;
            animation: wave 3s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% {
                clip-path: polygon(
                    0% 47%,
                    10% 48%,
                    33% 54%,
                    54% 60%,
                    70% 61%,
                    84% 59%,
                    100% 52%,
                    100% 100%,
                    0% 100%
                );
            }

            50% {
                clip-path: polygon(0% 60%,
                15% 65%,
                34% 66%,
                51% 62%,
                67% 50%,
                84% 45%,
                100% 46%,
                100% 100%,
                0% 100%
                );
            }
        }
    </style>
    <style>
        .titulo-3d {
            font-size: 3em;
            text-align: center;
            text-transform: uppercase;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 30px;
        }
    </style>

<div data-aos="zoom-in" class="container-fluid">
    <h2 class="border">Ficha Web de Valoración de Riesgo en Mujeres Víctimas de Violencia de Pareja</h2>
    <h2 class="wave">Ficha Web de Valoración de Riesgo en Mujeres Víctimas de Violencia de Pareja</h2>
</div>



<div class="container mt-5">
<div class="bold mt-4" data-aos="fade-up-right" style="font-weight: bold; font-size: larger;">PASO 3. PREGUNTAR PARA VALORACIÓN DEL RIESGO</div>
<br>
<div data-aos="fade-down-right">
Conteste si o no en donde corresponde ("si o no”). Los números en cada casila de respuesta son los puntajes de
cada pregunta. Si la mujer no sabe qué responder, repregunte. Si finalmente ella no tiene información para
responder, deje la pregunta correspondiente sin marcar.

En las siguientes preguntas, “Él” se refiere a su esposo; conviviente; pareja sexual sin hi
enamorado o novio que no es pareja sexual, ex esposo, ex conviviente, ex enamorado, o padre
de su hijo pero que no han vivido juntos.

Dígale lo siguiente a la víctima: “Ahora le voy a hacer una serie de preguntas. Por favor, responda “sí” o 'no' según
corresponda. Le agradezco su sinceridad”
</div>
<br>
    <form id="formulario">
        <div data-aos="flip-left" class="form-group">
            <label>Pregunta 1: ¿Estás de acuerdo?</label>
            <select name="pregunta1" class="form-control">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div data-aos="flip-left" class="form-group">
            <label>Pregunta 2: ¿Aceptas los términos?</label>
            <select name="pregunta2" class="form-control">
                <option value="2">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div data-aos="flip-left" class="form-group">
            <label>Pregunta 3: ¿Te gustaría recibir actualizaciones?</label>
            <select name="pregunta3" class="form-control">
                <option value="3">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <div data-aos="flip-left" class="form-group">
            <label>Pregunta 4: ¿PREGUNTA?</label>
            <select name="pregunta4" class="form-control">
                <option value="5">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <button data-aos="fade-up-left" type="button" id="enviar" class="btn btn-primary">Enviar</button>
        <div>-----------------</div>
         
    </form>
    <div id="info"></div>
    
    <div class="container mt-5">
        <h1 class="mb-4">Pregunta:</h1>
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion1" value="opcion1">
                    <label class="form-check-label" for="opcion1">
                        Opción 1: Python
                    </label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion2" value="opcion2">
                    <label class="form-check-label" for="opcion2">
                        Opción 2: JavaScript
                    </label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="opcion3" value="opcion3">
                    <label class="form-check-label" for="opcion3">
                        Opción 3: Java
                    </label>
                </div>
            </div>
        </div>

        <div class="container mt-5">
        <h1 class="titulo-3d">Datos Generales</h1>
        <form id="formulario">
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
                        <textarea class="form-control" id="institucion" name="institucion" style="height: 200px;"></textarea>
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <!-- Segunda parte en bloque -->
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="distrito">DISTRITO:</label>
                        <input type="text" class="form-control" id="distrito" name="distrito">
                    </div>
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="provincia">PROVINCIA:</label>
                        <input type="text" class="form-control" id="provincia" name="provincia">
                    </div>
                    <div data-aos="fade-up-right" class="form-group">
                        <label for="departamento">DEPARTAMENTO:</label>
                        <input type="text" class="form-control" id="departamento" name="departamento">
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
                            <input class="form-check-input" type="radio" name="discapacidad" id="no_discapacidad" value="no">
                            <label class="form-check-label" for="no_discapacidad">No</label>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos="fade-up-right" class="form-group">
                <label for="tipo_discapacidad">¿Qué tipo de discapacidad tiene?</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="fisica" name="tipo_discapacidad[]" value="fisica">
                    <label class="form-check-label" for="fisica">Física</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="psicosocial" name="tipo_discapacidad[]" value="psicosocial">
                    <label class="form-check-label" for="psicosocial">Psicosocial</label>
                </div>
                <!-- Repite el mismo patrón para los demás tipos de discapacidad -->
            </div>
            <div data-aos="fade-up-right" class="form-group">
                <label>Lengua Materna:</label>
                <select class="form-control" id="lengua_materna" name="lengua_materna">
                    <option value="Castellano">Castellano</option>
                    <option value="Quechua">Quechua</option>
                    <option value="Aymara">Aymara</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>
            <div data-aos="fade-up-right" class="form-group">
                <label>Lenguaje de Señas (Ley Osi O No 29535):</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="lenguaje_senas" id="si_lenguaje_senas" value="si">
                    <label class="form-check-label" for="si_lenguaje_senas">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="lenguaje_senas" id="no_lenguaje_senas" value="no">
                    <label class="form-check-label" for="no_lenguaje_senas">No</label>
                </div>
            </div>
            <div data-aos="fade-up-right" class="form-group">
                <label for="identidad_etnica">Identidad Étnica:</label>
                <input type="text" class="form-control" id="identidad_etnica" name="identidad_etnica">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
        
        <!-- Información para mostrar -->
        <div id="info" class="mt-3">
            <!-- Aquí se mostrará la información seleccionada -->
        </div>
    </div>

    <!-- Agrega los enlaces a las bibliotecas de jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Captura el evento de cambio en las opciones
        $("input[type='radio']").change(function() {
            // Obtén el valor de la opción seleccionada
            var opcionSeleccionada = $("input[name='opcion']:checked").val();
            
            // Muestra información correspondiente a la opción seleccionada
            mostrarInformacion(opcionSeleccionada);
        });

        // Función para mostrar información según la opción seleccionada
        function mostrarInformacion(opcion) {
            var infoDiv = $("#info");
            var informacion = "";

            // Definir la información para cada opción
            if (opcion === "opcion1") {
                informacion = "Python es un lenguaje de programación versátil y fácil de aprender.";
            } else if (opcion === "opcion2") {
                informacion = "JavaScript es ampliamente utilizado para desarrollo web y aplicaciones interactivas en el navegador.";
            } else if (opcion === "opcion3") {
                informacion = "Java es un lenguaje de programación utilizado en desarrollo de aplicaciones empresariales y móviles.";
            } else {
                informacion = "Selecciona una opción para ver más información.";
            }

            // Actualizar el contenido del div de información
            infoDiv.html("<p>" + informacion + "</p>");
        }
    </script>

</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#0099ff" fill-opacity="1" d="M0,32L48,58.7C96,85,192,139,288,176C384,213,480,235,576,202.7C672,171,768,85,864,58.7C960,32,1056,64,1152,112C1248,160,1344,224,1392,256L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#enviar").click(function() {
        $.ajax({
            type: "POST",
            url: "calcular.php",
            data: $("#formulario").serialize(),
            success: function(response) {
                $("#info").html(response);
            }
        });
    });
});
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
