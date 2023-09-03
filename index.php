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
    </form>
    <div id="info"></div>
    
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
