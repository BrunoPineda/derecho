<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $fecha = $_POST["date"];
    $nivelAgresion = $_POST["lista"];

    // Aquí puedes realizar cualquier procesamiento adicional con los datos

    // Por ejemplo, imprimir los datos o guardarlos en una base de datos
    echo "Fecha: " . $fecha . "<br>";
    echo "Nivel de agresión: " . $nivelAgresion;
} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
