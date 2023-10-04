<?php
include "conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['dni'])) {
    // Verifica que se haya enviado un token
    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $dni = $_SESSION['dni'];
        //echo "El token recibido es: " . $token. " y la session es ".$dni;

        $consulta1 = "SELECT v.token FROM `usuarios` as u inner JOIN validator as v on u.DNI = v.usuario_id WHERE v.token = '$token' limit 1";
        $resultado1 = $conexion->query($consulta1);
        $row1 = $resultado1->fetch_assoc();
        $tokenQuery = $row1['token'];

        if($tokenQuery == $token){
            $status = "UPDATE `validator` SET `status` = '1' WHERE `validator`.`usuario_id` = '$dni';";
            $conexion->query($status);
            echo "Usuario Autenticado correctamente.";
        }else {
            echo "Acceso no autorizado.";
        }

    } else {
        echo "No se recibió ningún token.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
