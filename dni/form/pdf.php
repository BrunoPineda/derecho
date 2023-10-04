<?php
require('fpdf/fpdf.php');

session_start();

class PDF extends FPDF {
    function Header() {
        global $i;
        $imagen = sprintf('documento/rm_328_2019_mimp_anexo-nuevo (1)_page-%04d.jpg', $i + 1, $i + 1);
        $this->Image($imagen, 0, 0, $this->w, $this->h);

        include "../conexion.php";
        //$dni = $_SESSION['dni'];
        $dni = '44312533';

        $consulta1 = "SELECT * FROM `form1_datos_generales` where cod_identiti = $dni";
        $resultado1 = $conexion->query($consulta1);
        $row1 = $resultado1->fetch_assoc();

        $id = $row1['id'];
        $apellidos_nombre = $row1['apellidos_nombre'];
        $fecha = $row1['fecha'];
        $institucion = $row1['institucion'];
        $distrito = $row1['distrito'];
        $provincia = $row1['provincia'];
        $departamento = $row1['departamento'];
        $rango_edad = $row1['rango_edad'];
        $documento_identidad = $row1['documento_identidad'];

        $extranjero = $row1['extranjero'];
        $numero_hijos = $row1['numero_hijos'];
        $ocupacion_victima = $row1['ocupacion_victima'];
        $discapacidad = $row1['discapacidad'];
        $tipo_discapacidad = $row1['tipo_discapacidad'];
        $lengua_materna = $row1['lengua_materna'];
        $lenguaje_senas = $row1['lenguaje_senas'];
        $identidad_etnica = $row1['identidad_etnica'];
        $cod_identiti = $row1['cod_identiti'];

        //part2
        $consulta2 = "SELECT * FROM `form2_valoracion_riesgo` where cod_identiti = $dni"; // Supongo que existe una relación entre form1 y form2 a través del campo 'id'
        $resultado2 = $conexion->query($consulta2);
        $row2 = $resultado2->fetch_assoc();

        $fecha_valoracion_riesgo = $row2['fecha'];
        $nivel_agresion = $row2['nivelAgresion'];


        //part3
        $consulta3 = "SELECT * FROM `form3_vulnerabilidad` where cod_identiti = $dni"; // Supongo que existe una relación entre form2 y form3 a través del campo 'id_form2'
        $resultado3 = $conexion->query($consulta3);
        $row3 = $resultado3->fetch_assoc();

        $pregunta_1 = $row3['pregunta_1'];
        $pregunta_2 = $row3['pregunta_2'];
        $pregunta_2a = $row3['pregunta_2a'];
        $pregunta_3 = $row3['pregunta_3'];
        $pregunta_4 = $row3['pregunta_4'];
        $pregunta_5 = $row3['pregunta_5'];
        $pregunta_5a = $row3['pregunta_5a'];
        $pregunta_6 = $row3['pregunta_6'];
        $pregunta_7 = $row3['pregunta_7'];
        $pregunta_8 = $row3['pregunta_8'];
        $pregunta_9 = $row3['pregunta_9'];
        $pregunta_10 = $row3['pregunta_10'];
        $pregunta_11 = $row3['pregunta_11'];
        $pregunta_12 = $row3['pregunta_12'];
        $pregunta_12a = $row3['pregunta_12a'];
        $pregunta_13 = $row3['pregunta_13'];
        $pregunta_14 = $row3['pregunta_14'];
        $pregunta_15 = $row3['pregunta_15'];
        $pregunta_16 = $row3['pregunta_16'];
        $pregunta_17 = $row3['pregunta_17'];
        $pregunta_18 = $row3['pregunta_18'];
        $pregunta_19 = $row3['pregunta_19'];
        $observaciones = $row3['observaciones'];




       
        $this->SetFont('Arial', 'B', 10);
        
 // Contenido para la primera página  eje x y eje y 
 if ($i == 0) {
    
    $this->SetXY(70, 89);
    $this->Cell(50, 10, $apellidos_nombre, 0, 1, 'L');
    $this->SetXY(150, 67);
    $this->Cell(50, 10,  $fecha, 0, 1, 'L');
    $this->SetFont('Arial', 'B', 8);
    $this->SetXY(64, 77);

    $this->Cell(10, 10,  $institucion, 0, 1, 'L');
    $this->SetXY(120, 73);
    $this->Cell(50, 10, $distrito, 0, 1, 'L');
    $this->SetXY(120, 78.5);
    $this->Cell(50, 10,  $provincia, 0, 1, 'L');
    $this->SetXY(120, 82.5);
    $this->Cell(50, 10,  $departamento, 0, 1, 'L');
    $this->SetXY(160, 89);
    $this->Cell(50, 10,  $rango_edad, 0, 1, 'L');
    $this->SetXY(66, 95);
    $this->Cell(50, 10, "X", 0, 1, 'L');
    $this->SetXY(66, 95);
    $this->SetXY(75, 95);
    $this->Cell(50, 10,  $dni, 0, 1, 'L');
    //$this->Cell(50, 10, "Extranjero: $extranjero", 0, 1, 'L');
    $this->SetXY(160, 95);
    $this->Cell(50, 10,  $numero_hijos, 0, 1, 'L');
    $this->SetXY(75, 116.5);
    $this->Cell(50, 10,   $ocupacion_victima, 0, 1, 'L');
    if($discapacidad=="no"){       
        $this->SetXY(72.5, 120.5);
        
    }else{
        $this->SetXY(66, 120.5);

        if($tipo_discapacidad=="fisica"){
            $this->SetXY(66, 126.5);
        }else if($tipo_discapacidad=="psicosocial"){
            $this->SetXY(81.4, 126.5);
        }else if($tipo_discapacidad=="visual"){
            $this->SetXY(66, 133.5);    
        } else if($tipo_discapacidad=="intelectual"){
            $this->SetXY(81.5, 133.5);
        } else if($tipo_discapacidad=="auditiva"){
            $this->SetXY(66, 140.5);
        } else if($tipo_discapacidad=="sordo_aciego"){
            $this->SetXY(81.5, 140.5);
        } else if($tipo_discapacidad=="mudo"){
            $this->SetXY(66, 146.5);
        }else{
            $this->SetXY(1000, 140.5);
        }  
        $this->Cell(50, 10, "X", 0, 1, 'L');
    }
    $this->Cell(50, 10, "X", 0, 1, 'L');
    
    if($lengua_materna=="Castellano"){
        $this->SetXY(134.8, 116.5);
    }else if($lengua_materna=="Quechua"){
        $this->SetXY(134.8, 120.5);
    }else if($lengua_materna=="Aymara"){
        $this->SetXY(134.8, 126.5); 
    }else{
        $this->SetXY(134.8, 133.5); 
    }
    $this->Cell(50, 10, "X", 0, 1, 'L');

    if($lenguaje_senas=="si"){
        $this->SetXY(134.8, 140.5);
    }else{
        $this->SetXY(141.3, 140.5);
    }
    $this->Cell(50, 10, "X", 0, 1, 'L');

 
    $this->SetXY(137.3, 148.5);
    $this->Cell(50, 10, $identidad_etnica, 0, 1, 'L');
}
// Contenido para la segunda página
else if ($i == 1) {
    $this->SetXY(155.3, 46);
    $this->Cell(50, 10, $nivel_agresion , 0, 1, 'L');
    //copiar esto
    if($pregunta_1==0){
        $this->SetXY(174, 109);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 109);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
     //copiar esto
     if($pregunta_2==0){
        $this->SetXY(174, 115);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 115);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_3==0){
        $this->SetXY(174, 129);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 129);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_4==0){
        $this->SetXY(174, 136);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(176, 136);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_5==0){
        $this->SetXY(174, 141);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 141);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_6==0){
        $this->SetXY(174, 152);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 152);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_7==0){
        $this->SetXY(174, 157);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(174, 157);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_8==0){
        $this->SetXY(174, 166);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(174, 166);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_9==0){
        $this->SetXY(174, 171);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(174, 171);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_10==0){
        $this->SetXY(174, 176);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 176);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_11==0){
        $this->SetXY(174, 181);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 181);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_12==0){
        $this->SetXY(174, 186);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 186);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_13==0){
        $this->SetXY(174, 200);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 200);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_14==0){
        $this->SetXY(174, 210);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 210);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_15==0){
        $this->SetXY(174, 215);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 215);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_16==0){
        $this->SetXY(173, 220);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(173, 220);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_16==0){
        $this->SetXY(173, 225);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(173, 225);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_17==0){
        $this->SetXY(173, 230);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(173, 230);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    if($pregunta_18==0){
        
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }else{
        $this->SetXY(167, 239);
        $this->Cell(50, 10, "X" , 0, 1, 'L');
    }
    $suma = $pregunta_1 + $pregunta_2 + $pregunta_3 + $pregunta_4 + $pregunta_5 + $pregunta_6 + $pregunta_7 + $pregunta_8 + $pregunta_9 + $pregunta_10 + $pregunta_11 + $pregunta_12
    + $pregunta_13 + $pregunta_14 + $pregunta_15 + $pregunta_16 + $pregunta_17 + $pregunta_18;
    $this->SetXY(170, 250);
    $this->Cell(200, 3, "$suma", 0, 1, 'L');
}else if ($i == 2) {
    $this->Cell(50, 10, "codigo: $cod_identiti", 0, 1, 'L');
}  

$i++;
}
}

$pdf = new PDF();
 
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();   
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  
$pdf->AddPage();  

$pdf->Output();

// Si deseas mostrar el PDF en el navegador
// descomenta las siguientes líneas
// header('Content-Type: application/pdf');
// $pdf->Output('pantalla_completa.pdf', 'I');
?>
