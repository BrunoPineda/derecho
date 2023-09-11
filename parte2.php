<form id="formulario2">
  <div class="container mt-5">
    <h1 class="mb-4">VALORACION DEL RIESGO</h1>
    <p>En esta seccion, usted le hará una serie de preguntas a la víctima. Las preguntas solo admiten dos respuestas (si/no).
    Las preguntas con el sufijo “a” (2a, 5a y 12a) son informativas, no suman puntaje de riesgo y sirven para atender
    mejor el caso. Si la mujer no sabe qué responder, repregunte. Si finalmente ella no tiene información para responder,
    deje la pregunta correspondiente sin marcar. Son tres los pasos para aplicar este instrumento. Para aplicar esta
    sección, usted necesita presentar el calendario de los últimos doce meses".
    </p>
    <h1 class="mb-4">PASO 1. IDENTIFICAR AGRESIONES EN LOS ULTIMOS DOCE MESES</h1>
    <p>[Nota para quien aplica el instrumento: Se le deberá mostrar el calendario de los últimos doce meses a la víctima.
    Por ejemplo, si la aplica en el mes de agosto, deberá presentarle el calendario desde septiembre del año anterior
    hasta agosto del presente año. El calendario ayuda a que la mujer recuerde mejor los hechos de violencia y que, por
    tanto, responda en forma más acertada las preguntas de este instrumento. No se necesita adjuntar el calendario al
    instrumento ni calificarlo. Su uso es solo una ayuda para las respuestas).</p>
    <h1 class="mb-4">PASO 2. INDICA NIVEL DE AGRESIÓN SUFRIDA</h1>
    <p>Ahora indique que tan graves fueron cada una de esas agresiones que usted ah señalado en el calendario de acuerdo a la siguiente escala.</p>
    <input type="date" name="date" class="form-control form-control-sm">
    <br>
    <div class="container">
      <div class="row border border-dark border-top">
        <div class="col-md-9 border-right">
          <p>1. Cachetadas, empujones, jalones de pelo o sin lesiones ni dolor prolongado.</p>
          <p>2. Puiietazos, patadas, moretones, cortes y/o dolor prolongado.</p>
          <p>3. Golpiza, golpes muy fuertes, quemaduras o huesos rotos. Número más alto señalado.</p>
          <p>4. Amenaza de usar un arma, lesiones en la cabeza, lesiones internas, o por la mujer en la lista de las lesiones permanentes.</p>
          <p>5. Uso de arma, heridas por arma (pistola, cuchillo u otros).</p>
        </div>
        <div class="col-md-3 border-left">
          <p>[A llenar por quien aplica el instrumento]: Escriba el número más alto señalado por la mujer en la lista de la</p>
          <div class="d-flex align-items-center">
            <div class="mr-3">izquierda:</div>
            <input type="number" name="lista" class="form-control form-control-sm" min="1" max="5">
          </div>
        </div>
      </div>
    </div>

    <!-- Botón de envío -->
    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    <div id="parte2"></div>
  </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#formulario2").submit(function(event) {
                    event.preventDefault(); // Previene el comportamiento predeterminado del formulario

                    $.ajax({
                        type: "POST",
                        url: "datosformulario2.php",
                        data: $(this).serialize(),
                        success: function(response) {
                        $("#parte2").html(response);
}
                    });
                });
            });

        </script>