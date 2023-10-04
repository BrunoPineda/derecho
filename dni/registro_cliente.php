<?php
include "conexion.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['dni'])) {
        $dni = $_POST['dni'];
        $_SESSION['dni'] = $dni;
    }
}

$correo = $_POST['correo'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$codigo = $_POST['codigo'];

echo "Correo: " . $correo . "<br>";
echo "DNI: " . $dni . "<br>";
echo "Nombre: " . $nombre . "<br>";
echo "Apellido Paterno: " . $apellidoPaterno . "<br>";
echo "Apellido Materno: " . $apellidoMaterno . "<br>";
echo "Código: " . $codigo . "<br>";

$sqlUser = "INSERT INTO usuarios (correo, DNI, nombre, apellidoPaterno, apellidoMaterno) VALUES ('$correo', $dni, '$nombre', '$apellidoPaterno', '$apellidoMaterno')";
$query_insert = mysqli_query($conexion, $sqlUser);

if ($query_insert) {
    $last_inserted_id = mysqli_insert_id($conexion);
    echo "El ID del nuevo registro es: " . $last_inserted_id;

    $sqlValidator = "INSERT INTO validator (status, token, usuario_id)
    VALUES (0, $codigo, $last_inserted_id);";
    $query_validator = mysqli_query($conexion, $sqlValidator);
}



?>