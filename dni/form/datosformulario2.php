<?php
session_start();
include "../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $fecha = $_POST["date"];
    $nivelAgresion = $_POST["lista"];

    if(isset($_SESSION['dni'])){
        $dni1 = $_SESSION['dni'];
    }
    // Aquí puedes realizar cualquier procesamiento adicional con los datos

    // Por ejemplo, imprimir los datos o guardarlos en una base de datos
    echo "Fecha: " . $fecha . "<br>";
    echo "Nivel de agresión: " . $nivelAgresion;

    $sql = "INSERT INTO form2_valoracion_riesgo (fecha, nivelAgresion, cod_identiti) 
    VALUES ('$fecha', '$nivelAgresion', '$dni1')";

    echo $sql;

    $query_insert = mysqli_query($conexion, $sql);


} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
