<?php session_start(); 
$b = 'b'; // Letra 'b'
$ano = date('Y'); // Año actual (cuatro dígitos)
$fecha = date('md'); // Fecha actual (mes y día)
$hora = date('His'); // Hora actual (hora, minutos y segundos)

$identificador = $b . $ano . $fecha . $hora;

$_SESSION['idUser'] = $identificador;
echo $_SESSION['idUser'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Derecho informático</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

</head>

<body class="gradient-background">

<style>

        * {
            font-family: 'Montserrat', sans-serif;
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700; /* Para la variante en negrita */
        }
        .gradient-background {
        background: linear-gradient(300deg,deepskyblue,#ffffff,#a4a4ab);
        background-size: 180% 180%;
        animation: gradient-animation 18s ease infinite;
        }

        @keyframes moveWaves {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-30px);
        }
        100% {
            transform: translateY(0);
        }
        }

        .wave-svg {
        animation: moveWaves 3s infinite alternate; /* La animación dura 3 segundos y se repite infinitamente */
        }

        @keyframes gradient-animation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
        }
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
 
        .swal2-popup {
            max-width: 100%;
            width: 100%;
            left: 0 !important;
            margin: 0 !important;
            transform: none !important;
            top: 0 !important;
        }

        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container-fluid h2 {
            font-size: 8vmin;
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
        .titulo-3d {
            font-size: 3em;
            text-align: center;
            text-transform: uppercase;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 30px;
        }
    </style>
    <script>
        Swal.fire({
    icon: 'info',
    html: `
        <div data-aos="zoom-in" class="container-fluid">
            <h2 class="border">Ficha Web de Valoración de Riesgo en Mujeres Víctimas de Violencia de Pareja</h2>
            <h2 class="wave">Ficha Web de Valoración de Riesgo en Mujeres Víctimas de Violencia de Pareja</h2>
        </div>
    `,
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
    cancelButtonAriaLabel: 'Thumbs down'
    });

    </script>
 <div class="card-header">
    <ul class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard">
        <li class="nav-item">
            <a class="nav-link" id="wizard1-tab" data-toggle="pill" href="#wizard1" role="tab" aria-controls="wizard1" aria-selected="true">
                <div class="wizard-step-icon">1</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 1</div>
                    <div class="wizard-step-text-details">Datos generales</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " id="wizard2-tab" data-toggle="pill" href="#wizard2" role="tab" aria-controls="wizard2" aria-selected="false">
                <div class="wizard-step-icon">2</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 2</div>
                    <div class="wizard-step-text-details">Valoración de riesgo</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard3-tab" data-toggle="pill" href="#wizard3" role="tab" aria-controls="wizard3" aria-selected="false">
                <div class="wizard-step-icon">3</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 3</div>
                    <div class="wizard-step-text-details">Factores de vulnerabilidad</div>
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" id="wizard4-tab" data-toggle="pill" href="#wizard4" role="tab" aria-controls="wizard4" aria-selected="false">
                <div class="wizard-step-icon">4</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 4</div>
                    <div class="wizard-step-text-details">Carácteristicas de ubicación, actividades y señales fisicas</div>
                </div>
            </a>
        </li>
    </ul>
</div>

<div class="tab-content">
    <div class="tab-pane fade show active" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
        <!-- Contenido del Paso 1 -->        
        <?php include 'parte1.php' ?>
        <button class="btn btn-primary" type="button" data-target="#wizard2" data-toggle="pill">Next</button>
         
    </div>
    </div>
    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
        <!-- Contenido del Paso 2 -->
        <?php include 'parte2.php' ?>
        <button class="btn btn-primary" type="button" data-target="#wizard3" data-toggle="pill">Next</button>
         
    </div>
    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
        <!-- Contenido del Paso 3 -->
        <?php include 'parte3.php' ?>
        <button class="btn btn-primary" type="button" data-target="#wizard4" data-toggle="pill">Next</button>
         
    </div>
    <div class="tab-pane fade" id="wizard4" role="tabpanel" aria-labelledby="wizard4-tab">
        <!-- Contenido del Paso 4 -->
        <?php include 'parte4.php' ?>
        <button class="btn btn-primary" type="button" data-target="#wizard5" data-toggle="pill">Next</button>
         
    </div>
</div>
 
    </div>

    <!-- Agrega los enlaces a las bibliotecas de jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
  

</div>

<svg class="wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 
<script>
  AOS.init();
</script>
</body>
</html>
