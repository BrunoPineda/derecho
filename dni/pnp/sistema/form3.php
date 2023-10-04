<div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Pregunta 1</th>
                            <th>Pregunta 2</th>
                            <th>Pregunta 2a</th>
                            <th>Pregunta 3</th>
                            <th>Pregunta 4</th>
                            <th>Pregunta 5</th>
                            <th>Pregunta 5a</th>
                            <th>Pregunta 6</th>
                            <th>Pregunta 7</th>
                            <th>Pregunta 8</th>
                            <th>Pregunta 9</th>
                            <th>Pregunta 10</th>
                            <th>Pregunta 11</th>
                            <th>Pregunta 12</th>
                            <th>Pregunta 12a</th>
                            <th>Pregunta 13</th>
                            <th>Pregunta 14</th>
                            <th>Pregunta 15</th>
                            <th>Pregunta 16</th>
                            <th>Pregunta 17</th>
                            <th>Pregunta 18</th>
                            <th>Pregunta 19</th>
                            <th>Observaciones</th>
                            <th>Cod Identiti</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <th>ACCIONES</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT * FROM form3_vulnerabilidad");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['pregunta_1']; ?></td>
                                    <td><?php echo $data['pregunta_2']; ?></td>
                                    <td><?php echo $data['pregunta_2a']; ?></td>
                                    <td><?php echo $data['pregunta_3']; ?></td>
                                    <td><?php echo $data['pregunta_4']; ?></td>
                                    <td><?php echo $data['pregunta_5']; ?></td>
                                    <td><?php echo $data['pregunta_5a']; ?></td>
                                    <td><?php echo $data['pregunta_6']; ?></td>
                                    <td><?php echo $data['pregunta_7']; ?></td>
                                    <td><?php echo $data['pregunta_8']; ?></td>
                                    <td><?php echo $data['pregunta_9']; ?></td>
                                    <td><?php echo $data['pregunta_10']; ?></td>
                                    <td><?php echo $data['pregunta_11']; ?></td>
                                    <td><?php echo $data['pregunta_12']; ?></td>
                                    <td><?php echo $data['pregunta_12a']; ?></td>
                                    <td><?php echo $data['pregunta_13']; ?></td>
                                    <td><?php echo $data['pregunta_14']; ?></td>
                                    <td><?php echo $data['pregunta_15']; ?></td>
                                    <td><?php echo $data['pregunta_16']; ?></td>
                                    <td><?php echo $data['pregunta_17']; ?></td>
                                    <td><?php echo $data['pregunta_18']; ?></td>
                                    <td><?php echo $data['pregunta_19']; ?></td>
                                    <td><?php echo $data['observaciones']; ?></td>
                                    <td><?php echo $data['cod_identiti']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_form3.php?id=<?php echo $data['id']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>

                                            <form action="eliminar_form3.php?id=<?php echo $data['id']; ?>" method="post" class="confirmar d-inline">
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
        
       