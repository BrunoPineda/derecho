<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta1 = isset($_POST["pregunta1"]) ? intval($_POST["pregunta1"]) : 0;
    $pregunta2 = isset($_POST["pregunta2"]) ? intval($_POST["pregunta2"]) : 0;
    $pregunta3 = isset($_POST["pregunta3"]) ? intval($_POST["pregunta3"]) : 0;
    $pregunta4 = isset($_POST["pregunta4"]) ? intval($_POST["pregunta4"]) : 0;

    $total = $pregunta1 + $pregunta2 + $pregunta3 + $pregunta4;

    if($total <= 7){
        echo "LEVE";
    }

    echo "La suma de los valores es: " . $total;
}
?>
