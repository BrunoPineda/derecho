<?php
session_start();
include "../conexion.php";

if(isset($_SESSION['dni'])){
    $dni1 = $_SESSION['dni'];
}

$apellidos_nombre = $_POST['apellidos_nombre'];
$fecha = $_POST['fecha'];
$institucion = $_POST['institucion'];
$distrito = $_POST['distrito'];
$provincia = $_POST['provincia'];
$departamento = $_POST['departamento'];
$rango_edad = $_POST['rango_edad'];
$documento_identidad = $_POST['documento_identidad'];
$dni = $_POST['dni'];
$extranjero = $_POST['extranjero'];
$numero_hijos = $_POST['numero_hijos'];
$ocupacion_victima = $_POST['ocupacion_victima'];
$discapacidad = $_POST['discapacidad'];
$tipo_discapacidad = $_POST['tipo_discapacidad'];
$lengua_materna = $_POST['lengua_materna'];
$lenguaje_senas = $_POST['lenguaje_senas'];
$identidad_etnica = $_POST['identidad_etnica'];

echo "Apellidos y Nombre: " . $apellidos_nombre . "<br>";
echo "Fecha: " . $fecha . "<br>";
echo "Institución: " . $institucion . "<br>";
echo "Distrito: " . $distrito . "<br>";
echo "Provincia: " . $provincia . "<br>";
echo "Departamento: " . $departamento . "<br>";
echo "Rango de Edad: " . $rango_edad . "<br>";
echo "Documento de Identidad: " . $documento_identidad . "<br>";
echo "Número de DNI: " . $dni . "<br>";
echo "Número de Carné de Extranjería: " . $extranjero . "<br>";
echo "Número de hijos/as menores: " . $numero_hijos . "<br>";
echo "Ocupación de la víctima: " . $ocupacion_victima . "<br>";
echo "Situación de discapacidad: " . $discapacidad . "<br>";
echo "Tipo de discapacidad: " . $tipo_discapacidad . "<br>";
echo "Lengua Materna: " . $lengua_materna . "<br>";
echo "Lenguaje de Señas: " . $lenguaje_senas . "<br>";
echo "Identidad Étnica: " . $identidad_etnica . "<br>";

$sql = "INSERT INTO form1_datos_generales (apellidos_nombre, fecha, institucion, distrito, provincia, departamento, rango_edad, documento_identidad, dni, extranjero, numero_hijos, ocupacion_victima, discapacidad, tipo_discapacidad, lengua_materna, lenguaje_senas, identidad_etnica, cod_identiti) 
VALUES ('$apellidos_nombre', '$fecha', '$institucion', '$distrito', '$provincia ', '$departamento', '$rango_edad', '$documento_identidad', '$dni', '$extranjero', '$numero_hijos', '$ocupacion_victima', '$discapacidad', '$tipo_discapacidad', '$lengua_materna', '$lenguaje_senas', '$identidad_etnica', '$dni1')";

echo $sql;

$query_insert = mysqli_query($conexion, $sql);


?>
