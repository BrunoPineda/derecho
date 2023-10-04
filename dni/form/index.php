<?php session_start(); 

if(isset($_SESSION['dni'])){
    $dni = $_SESSION['dni'];
    echo "EL DNI ES " . $dni;
} else {
    header("Location: ../index.php"); // Esta línea redirecciona al usuario de vuelta a ../index.php
    exit(); // Asegúrate de terminar el script después de la redirección
}

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
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<body class="gradient-background">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<style>

        * {
            font-family: 'Montserrat', sans-serif;
        }

        h1 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700; /* Para la variante en negrita */
        }
        .gradient-background {
            background: linear-gradient(300deg, lightgreen, #ffffff, #a4a4ab);
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
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 30px;
            background: linear-gradient(135deg, #104a38 25%, #186c54 60%, #1f7d61 80%);
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            border-radius: 10px; /* Esquinas redondeadas */
        }


   
    </style>
 


<button onclick="changeLanguage('qu')">Lenguaje</button>
<div id="google_translate_element"></div>


 <div class="card-header">
    <ul class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard">
        <li class="nav-item">
            <a class="nav-link active" id="wizard1-tab" data-toggle="pill" href="#wizard1" role="tab" aria-controls="wizard1" aria-selected="true">
                <div class="wizard-step-icon">1</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 1</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="./img/solicitud.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Datos generales
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard2-tab" data-toggle="pill" href="#wizard2" role="tab" aria-controls="wizard2" aria-selected="false">
                <div class="wizard-step-icon">2</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 2</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="./img/valoracion.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Valoración de riesgo
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard3-tab" data-toggle="pill" href="#wizard3" role="tab" aria-controls="wizard3" aria-selected="false">
                <div class="wizard-step-icon">3</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 3</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="./img/vulnerabilidad.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Factores de vulnerabilidad
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard4-tab" data-toggle="pill" href="#wizard4" role="tab" aria-controls="wizard4" aria-selected="false">
                <div class="wizard-step-icon">4</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 4</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="./img/caracteristicas.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Carácteristicas de ubicación, actividades y señales físicas
                    </div>
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
 

 
        <!-- Información para mostrar -->
        <div id="info" class="mt-3">
            <!-- Aquí se mostrará la información seleccionada -->
        </div>
    </div>

    <!-- Agrega los enlaces a las bibliotecas de jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
 

</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#104a38" fill-opacity="1" d="M0,288L40,250.7C80,213,160,139,240,133.3C320,128,400,192,480,197.3C560,203,640,149,720,154.7C800,160,880,224,960,224C1040,224,1120,160,1200,128C1280,96,1360,96,1400,96L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>

<script src="languages.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
