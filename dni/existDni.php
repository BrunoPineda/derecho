<?php
include "conexion.php";
$dni = $_POST['dni']; // Suponiendo que el DNI se envía por POST

// Realiza la validación del DNI aquí

if (!empty($dni)) {

    $sql1 = "DELETE v, u FROM `validator` as v inner join usuarios as u on v.usuario_id = u.DNI WHERE V.status = 0;";
    $resultado1 = $conexion->query($sql1);

    $consulta1 = "SELECT count(*) as count FROM `usuarios` WHERE DNI = '$dni' limit 1";
    $resultado1 = $conexion->query($consulta1);
    $row1 = $resultado1->fetch_assoc();
    $validate = $row1['count'];

    if($validate==1){
       echo "1";
    }else{
       echo "0";
    }


} else {
    echo '0';
}

?>
