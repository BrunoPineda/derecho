<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de DNI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
</head>

<style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    /* Agrega estilos adicionales según tus necesidades */
	.form-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }
        
        .form-card:hover {
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select {
            border: none;
            border-radius: 10px;
            padding: 10px;
            transition: box-shadow 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .form-group input[type="text"]:focus,
        .form-group input[type="email"]:focus,
        .form-group input[type="tel"]:focus,
        .form-group input[type="date"]:focus,
        .form-group input[type="number"]:focus,
        .form-group select:focus {
            outline: none;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        .animated-input input {
            border: none;
            border-bottom: 2px solid #ccc;
            transition: border-bottom 0.3s;
        }

        .animated-input input:focus {
            border-bottom: 2px solid #007bff;
            outline: none;
        }
  </style>

<?php include "./components/header.php"; ?>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="mb-4 text-center">Registro de proceso de solicitud para la ley 30364</h1>
            <form id="dniForm">
                <div class="form-group d-flex align-items-center justify-content-center">
                    <label for="dni">DNI:</label>
                    <input type="number" id="dni" name="dni" class="form-control" maxlength="8" required>
                    <button type="submit" id="consultar" class="btn btn-primary ml-2">Consultar</button>
                </div>
                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidoPaterno">Apellido Paterno:</label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="apellidoMaterno">Apellido Materno:</label>
                    <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control" readonly>
                </div>
                <div class="text-center">
                    <button type="submit" id="registro" class="btn btn-primary">Registrar</button>
                </div>
            </form>

            <div id="result" class="mt-4"></div>
        </div>
    </div>

    <div id="modal" hidden></div>

    <script>
        $(document).ready(function() {
            $('#consultar').click(function() {
                event.preventDefault();

                var dni = $('#dni').val();
                var correo = $('#correo').val();

                $.ajax({
                    type: 'POST',
                    url: 'existDni.php',
                    data: { dni: dni, correo: correo },
                    success: function(data) {
                        // Maneja la respuesta de validateDNI.php
                        console.log(data);

                        if(data == 1){
                            Swal.fire({
                            icon: 'error',
                            title: 'Este DNI ya existe en la base de datos',
                            text: 'Porfavor inicie sesión',
                            imageUrl: 'https://i.pinimg.com/originals/9f/82/9f/9f829f16ffd9b9439937a52136260a9a.jpg',
                            imageHeight: 300,
                            imageAlt: 'pnp'
                            });
                        }

                        $('#modal').html(data); // Asumiendo que el contenido es HTML
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
        });

    </script>

    <?php include "./components/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script type="text/javascript">
    emailjs.init('csOvZ9a53KM7jM5xE')
    </script>
    <script src="script.js"></script>
    
    <!-- Asegúrate de incluir jQuery y jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
</body>
</html>
