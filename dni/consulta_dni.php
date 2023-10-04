<?php
if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsdC52bC00bzI0cjhtM0B5b3BtYWlsLmNvbSJ9.SXQL8IoaQpcebXJuvTyyUq3Sl-JcEI9q_QkiRe2k93g'; // Reemplaza 'tu_token_aqui' con tu propio token

    $url = "https://dniruc.apisperu.com/api/v1/dni/{$dni}?token={$token}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['dni'])) {
        $result = array(
            'success' => true,
            'data' => array(
                'nombres' => $data['nombres'],
                'apellido_paterno' => $data['apellidoPaterno'],
                'apellido_materno' => $data['apellidoMaterno']
            )
        );
    } else {
        $result = array('success' => false);
    }

    echo json_encode($result);
} else {
    echo json_encode(array('success' => false));
}
?>
