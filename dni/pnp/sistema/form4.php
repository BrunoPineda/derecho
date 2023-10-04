<div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Pregunta 1</th>
                            <th>Pregunta 2</th>
                            <th>Pregunta 3</th>
                            <th>Pregunta 4</th>
                            <th>Pregunta 5</th>
                            <th>Pregunta 6</th>
                            <th>Pregunta 7</th>
                            <th>Pregunta 8</th>
                            <th>Pregunta 9</th>
                            <th>Pregunta 10</th>
                            <th>Cod Identiti</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <th>ACCIONES</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT * FROM form4_caracteristicas");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['pregunta1']; ?></td>
                                    <td><?php echo $data['pregunta2']; ?></td>
                                    <td><?php echo $data['pregunta3']; ?></td>
                                    <td><?php echo $data['pregunta4']; ?></td>
                                    <td><?php echo $data['pregunta5']; ?></td>
                                    <td><?php echo $data['pregunta6']; ?></td>
                                    <td><?php echo $data['pregunta7']; ?></td>
                                    <td><?php echo $data['pregunta8']; ?></td>
                                    <td><?php echo $data['pregunta9']; ?></td>
                                    <td><?php echo $data['pregunta10']; ?></td>
                                    <td><?php echo $data['cod_identiti']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_form4.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

                                            <form action="eliminar_form4.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
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