  <!-- Contenido del Paso 1 -->
  <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Apellidos y Nombre</th>
                                <th>Fecha</th>
                                <th>Institución</th>
                                <th>Distrito</th>
                                <th>Provincia</th>
                                <th>Departamento</th>
                                <th>Rango de Edad</th>
                                <th>Documento de Identidad</th>
                                <th>DNI</th>
                                <th>Extranjero</th>
                                <th>Número de Hijos</th>
                                <th>Ocupación de la Víctima</th>
                                <th>Discapacidad</th>
                                <th>Tipo de Discapacidad</th>
                                <th>Lengua Materna</th>
                                <th>Lenguaje de Señas</th>
                                <th>Identidad Étnica</th>
                                <th>Cod Identiti</th>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                    <th>ACCIONES</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../conexion.php";

                            $query = mysqli_query($conexion, "SELECT * FROM form1_datos_generales");
                            $result = mysqli_num_rows($query);
                            if ($result > 0) {
                                while ($data = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['apellidos_nombre']; ?></td>
                                        <td><?php echo $data['fecha']; ?></td>
                                        <td><?php echo $data['institucion']; ?></td>
                                        <td><?php echo $data['distrito']; ?></td>
                                        <td><?php echo $data['provincia']; ?></td>
                                        <td><?php echo $data['departamento']; ?></td>
                                        <td><?php echo $data['rango_edad']; ?></td>
                                        <td><?php echo $data['documento_identidad']; ?></td>
                                        <td><?php echo $data['dni']; ?></td>
                                        <td><?php echo $data['extranjero']; ?></td>
                                        <td><?php echo $data['numero_hijos']; ?></td>
                                        <td><?php echo $data['ocupacion_victima']; ?></td>
                                        <td><?php echo $data['discapacidad']; ?></td>
                                        <td><?php echo $data['tipo_discapacidad']; ?></td>
                                        <td><?php echo $data['lengua_materna']; ?></td>
                                        <td><?php echo $data['lenguaje_senas']; ?></td>
                                        <td><?php echo $data['identidad_etnica']; ?></td>
                                        <td><?php echo $data['cod_identiti']; ?></td>
                                        <?php if ($_SESSION['rol'] == 1) { ?>
                                            <td>
                                                <a href="editar_form1.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

                                                <form action="eliminar_form1.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
                                                    <button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> </button>
                                                </form>
                                            </td>
                                        <?php } ?>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>