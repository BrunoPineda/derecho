<?php
session_start();
include "../conexion.php";
if(isset($_SESSION['dni'])){
    $dni1 = $_SESSION['dni'];
}

$dni_image = $_FILES['dni_image'];
$huella_image = $_FILES['huella_image'];

$fechaActual = date('YmdHis');

$dni_image_name = $_FILES['dni_image']['name'];
$dni_image_file = pathinfo($dni_image_name, PATHINFO_FILENAME);
$dni_image_extension = pathinfo($dni_image_name, PATHINFO_EXTENSION);

$huella_image_name = $_FILES['huella_image']['name'];
$huella_image_file = pathinfo($huella_image_name, PATHINFO_FILENAME);
$huella_image_extension = pathinfo($huella_image_name, PATHINFO_EXTENSION);


$target_dir = "file/";
$target_dni = $target_dir . $fechaActual.'-'. basename($dni_image["name"]);
$target_huella = $target_dir . $fechaActual.'-'. basename($huella_image["name"]);

move_uploaded_file($dni_image["tmp_name"], $target_dni);
move_uploaded_file($huella_image["tmp_name"], $target_huella);
 
// Insertar en la base de datos
$sql = "INSERT INTO file_client (name_dni, url_dni, type_dni, name_huella, url_huella, type_huella, cod_identiti) 
        VALUES ('$dni_image_name', '$target_dni', '$dni_image_extension', '$huella_image_name', '$target_huella', '$huella_image_extension', '$dni1')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Registro insertado correctamente.";
    } else {
    echo "Error al insertar el registro: " . $conexion->error;
    }



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta1 = isset($_POST["pregunta1"]) ? intval($_POST["pregunta1"]) : 0;
    $pregunta2 = isset($_POST["pregunta2"]) ? intval($_POST["pregunta2"]) : 0;

    $pregunta2a =  $_POST["ocupacion_victima"];

    $pregunta3 = isset($_POST["pregunta3"]) ? intval($_POST["pregunta3"]) : 0;
    $pregunta4 = isset($_POST["pregunta4"]) ? intval($_POST["pregunta4"]) : 0;
    $pregunta5 = isset($_POST["pregunta5"]) ? intval($_POST["pregunta5"]) : 0;

    $pregunta5a = $_POST["respuesta5a"];

    $pregunta6 = isset($_POST["pregunta6"]) ? intval($_POST["pregunta6"]) : 0;
    $pregunta7 = isset($_POST["pregunta7"]) ? intval($_POST["pregunta7"]) : 0;
    $pregunta8 = isset($_POST["pregunta8"]) ? intval($_POST["pregunta8"]) : 0;
    $pregunta9 = isset($_POST["pregunta9"]) ? intval($_POST["pregunta9"]) : 0;
    $pregunta10 = isset($_POST["pregunta10"]) ? intval($_POST["pregunta10"]) : 0;
    $pregunta11 = isset($_POST["pregunta11"]) ? intval($_POST["pregunta11"]) : 0;
    $pregunta12 = isset($_POST["pregunta12"]) ? intval($_POST["pregunta12"]) : 0;

    $pregunta12a = $_POST["pregunta12a"];

    $pregunta13 = isset($_POST["pregunta13"]) ? intval($_POST["pregunta13"]) : 0;
    $pregunta14 = isset($_POST["pregunta14"]) ? intval($_POST["pregunta14"]) : 0;
    $pregunta15 = isset($_POST["pregunta15"]) ? intval($_POST["pregunta15"]) : 0;
    $pregunta16 = isset($_POST["pregunta16"]) ? intval($_POST["pregunta16"]) : 0;
    $pregunta17 = isset($_POST["pregunta17"]) ? intval($_POST["pregunta17"]) : 0;
    $pregunta18 = isset($_POST["pregunta18"]) ? intval($_POST["pregunta18"]) : 0;
    $pregunta19 = isset($_POST["pregunta19"]) ? intval($_POST["pregunta19"]) : 0;

    $interes = $_POST["interes"];

    $sql = "INSERT INTO form3_vulnerabilidad 
    (pregunta_1, pregunta_2, pregunta_2a, pregunta_3, pregunta_4, pregunta_5, pregunta_5a, 
    pregunta_6, pregunta_7, pregunta_8, pregunta_9, pregunta_10, pregunta_11, pregunta_12, 
    pregunta_12a, pregunta_13, pregunta_14, pregunta_15, pregunta_16, pregunta_17, pregunta_18, 
    pregunta_19, observaciones, cod_identiti) 
    VALUES 
    ('$pregunta1', '$pregunta2', '$pregunta2a', '$pregunta3', '$pregunta4', '$pregunta5', 
    '$pregunta5a', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10', 
    '$pregunta11', '$pregunta12', '$pregunta12a', '$pregunta13', '$pregunta14', '$pregunta15', 
    '$pregunta16', '$pregunta17', '$pregunta18', '$pregunta19', '$interes', '$dni1')";

    echo $sql;

    $query_insert = mysqli_query($conexion, $sql);

    $total = $pregunta1 + $pregunta2 + $pregunta3 + $pregunta4 + $pregunta5 + $pregunta6 + $pregunta7 + $pregunta8 +
             $pregunta9 + $pregunta10 + $pregunta11 + $pregunta12 + $pregunta13 + $pregunta14 + $pregunta15 + $pregunta16
             + $pregunta17 + $pregunta18 + $pregunta19 ;

             if($total <= 7){
                $mensaje = "LEVE";
                $color = "success"; // Verde
            }
            else if (8 <= $total && $total <= 13){
                $mensaje = "Moderado";
                $color = "warning"; // Naranja
            }
            else if (14 <= $total && $total <= 17){
                $mensaje = "Severo 1";
                $color = "danger"; // Rojo suave
            }
            else {
                $mensaje = "Severo 2";
                $color = "dark"; // Rojo oscuro
            }
        }
        ?>
        
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Resultado de Evaluación</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body class="bg-light">
        
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card text-white bg-<?php echo $color; ?> mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $mensaje; ?></h5>
                            <p class="card-text">Nivel de riesgo correspondiente de acuerdo al puntaje obtenido: <?php echo $total; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>

        
        
        
        