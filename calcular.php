<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta1 = isset($_POST["pregunta1"]) ? intval($_POST["pregunta1"]) : 0;
    $pregunta2 = isset($_POST["pregunta2"]) ? intval($_POST["pregunta2"]) : 0;
    $pregunta3 = isset($_POST["pregunta3"]) ? intval($_POST["pregunta3"]) : 0;
    $pregunta4 = isset($_POST["pregunta4"]) ? intval($_POST["pregunta4"]) : 0;
    $pregunta5 = isset($_POST["pregunta5"]) ? intval($_POST["pregunta5"]) : 0;
    $pregunta6 = isset($_POST["pregunta6"]) ? intval($_POST["pregunta6"]) : 0;
    $pregunta7 = isset($_POST["pregunta7"]) ? intval($_POST["pregunta7"]) : 0;
    $pregunta8 = isset($_POST["pregunta8"]) ? intval($_POST["pregunta8"]) : 0;
    $pregunta9 = isset($_POST["pregunta9"]) ? intval($_POST["pregunta9"]) : 0;
    $pregunta10 = isset($_POST["pregunta10"]) ? intval($_POST["pregunta10"]) : 0;
    $pregunta11 = isset($_POST["pregunta11"]) ? intval($_POST["pregunta11"]) : 0;
    $pregunta12 = isset($_POST["pregunta12"]) ? intval($_POST["pregunta12"]) : 0;
    $pregunta13 = isset($_POST["pregunta13"]) ? intval($_POST["pregunta13"]) : 0;
    $pregunta14 = isset($_POST["pregunta14"]) ? intval($_POST["pregunta14"]) : 0;
    $pregunta15 = isset($_POST["pregunta15"]) ? intval($_POST["pregunta15"]) : 0;
    $pregunta16 = isset($_POST["pregunta16"]) ? intval($_POST["pregunta16"]) : 0;
    $pregunta17 = isset($_POST["pregunta17"]) ? intval($_POST["pregunta17"]) : 0;
    $pregunta18 = isset($_POST["pregunta18"]) ? intval($_POST["pregunta18"]) : 0;
    $pregunta19 = isset($_POST["pregunta19"]) ? intval($_POST["pregunta19"]) : 0;
    $pregunta20 = isset($_POST["pregunta20"]) ? intval($_POST["pregunta20"]) : 0;
    $pregunta21 = isset($_POST["pregunta21"]) ? intval($_POST["pregunta21"]) : 0;


    $total = $pregunta1 + $pregunta2 + $pregunta3 + $pregunta4 + $pregunta5 + $pregunta6 + $pregunta7 + $pregunta8 +
             $pregunta9 + $pregunta10 + $pregunta11 + $pregunta12 + $pregunta13 + $pregunta14 + $pregunta15 + $pregunta16
             + $pregunta17 + $pregunta18 + $pregunta19 + $pregunta20  + $pregunta21;

    if($total <= 7){
        echo "LEVE";
    }
    else {
        if (8<=$total<=13){
            echo "Moderador";
        }
        else if (14<=$total<=17){
            echo "Severo 1";
        }
        else {
            $total<=18
            echo "Severo 2"; 
        }
        

    }

    echo "Nivel de risgo correspondiente de acuerdo al puntaje obtenido: " . $total;
}
?>
