<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Procesos</h1>
		<a href="registro_producto.php" class="btn btn-primary">Nuevo</a>
	</div>

	<div class="card-header">
    <ul class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard">
        <li class="nav-item">
            <a class="nav-link active" id="wizard1-tab" data-toggle="pill" href="#wizard1" role="tab" aria-controls="wizard1" aria-selected="true">
                <div class="wizard-step-icon">1</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 1</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="../../form/img/solicitud.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Datos generales
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard2-tab" data-toggle="pill" href="#wizard2" role="tab" aria-controls="wizard2" aria-selected="false">
                <div class="wizard-step-icon">2</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 2</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="../../form/img/valoracion.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Valoración de riesgo
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard3-tab" data-toggle="pill" href="#wizard3" role="tab" aria-controls="wizard3" aria-selected="false">
                <div class="wizard-step-icon">3</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 3</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="../../form/img/vulnerabilidad.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Factores de vulnerabilidad
                    </div>

                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="wizard4-tab" data-toggle="pill" href="#wizard4" role="tab" aria-controls="wizard4" aria-selected="false">
                <div class="wizard-step-icon">4</div>
                <div class="wizard-step-text">
                    <div class="wizard-step-text-name">Paso 4</div>
                    <div class="wizard-step-text-details" style="display: flex; align-items: center;">
                        <img src="../../form/img/caracteristicas.png" alt="Imagen" style="width: 50px; height: 50px; margin-right: 10px;">
                        Carácteristicas de ubicación, actividades y señales físicas
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>


<div class="tab-content">
    <!-- Paso 1 -->
    <div class="tab-pane fade show active" id="wizard1" role="tabpanel" aria-labelledby="wizard1-tab">
        <?php include "form1.php"; ?>
        <button class="btn btn-primary" type="button" data-target="#wizard2" data-toggle="pill">Next</button>
    </div>
  
    <!-- Paso 2 -->
    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
        <?php include "form2.php"; ?>
        <button class="btn btn-primary" type="button" data-target="#wizard3" data-toggle="pill">Next</button>
    </div>
    
    <!-- Paso 3 -->
    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
    <?php include "form3.php"; ?>
        <button class="btn btn-primary" type="button" data-target="#wizard4" data-toggle="pill">Next</button>
    </div>
    
    <!-- Paso 4 -->
    <div class="tab-pane fade" id="wizard4" role="tabpanel" aria-labelledby="wizard4-tab">
    <?php include "form4.php"; ?>
        <button class="btn btn-primary" type="button" data-target="#wizard5" data-toggle="pill">Next</button>
    </div>
</div>

	

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>