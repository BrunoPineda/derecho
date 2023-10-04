<?php
session_start();
include "../conexion.php";

if(isset($_SESSION['dni'])){
    $dni1 = $_SESSION['dni'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $pregunta1 = $_POST["pregunta1"];
    $pregunta2 = $_POST["pregunta2"];
    $pregunta3 = $_POST["pregunta3"];
    $pregunta4 = $_POST["pregunta4"];
    $pregunta5 = $_POST["pregunta5"];
    $pregunta6 = $_POST["pregunta6"];
    $pregunta7 = $_POST["pregunta7"];
    $pregunta8 = $_POST["pregunta8"];
    $pregunta9 = $_POST["pregunta9"];
    $pregunta10 = $_POST["pregunta10"];

    

    // Aquí puedes realizar cualquier procesamiento adicional con los datos

    // Por ejemplo, imprimir los datos o guardarlos en una base de datos
    echo "Pregunta 1: " . $pregunta1 . "<br>";
    echo "Pregunta 2: " . $pregunta2 . "<br>";
    echo "Pregunta 3: " . $pregunta3 . "<br>";
    echo "Pregunta 4: " . $pregunta4 . "<br>";
    echo "Pregunta 5: " . $pregunta5 . "<br>";
    echo "Pregunta 6: " . $pregunta6 . "<br>";
    echo "Pregunta 7: " . $pregunta7 . "<br>";
    echo "Pregunta 8: " . $pregunta8 . "<br>";
    echo "Pregunta 9: " . $pregunta9 . "<br>";
    echo "Pregunta 10: " . $pregunta10 . "<br>";

    $sql = "INSERT INTO form4_caracteristicas (pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, cod_identiti) 
        VALUES ('$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10', '$dni1')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
    echo "Registro insertado correctamente.";
    } else {
    echo "Error al insertar el registro: " . $conexion->error;
    }

} else {
    echo "Error: Se esperaba una solicitud POST.";
}
?>
