<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Validar Cuenta</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php include "./components/header.php"; ?>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-shield-alt"></i> Ingresa el token para validar tu cuenta</h5>
                        <form id="validationForm">
                            <div class="form-group">
                                <label for="token">Token</label>
                                <input type="text" class="form-control" id="token" placeholder="Ingresa tu token" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Validar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Incluye Bootstrap JS y dependencias Popper.js y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#validationForm').submit(function(e) {
                e.preventDefault(); // Evita el envío del formulario por defecto

                var token = $('#token').val(); // Obtiene el valor del campo de token

                // Envía el token a validate.php usando AJAX
                $.ajax({
                    type: 'POST',
                    url: 'confirm.php',
                    data: { token: token },
                    success: function(response) {
                        // Maneja la respuesta de validate.php
                        // Puedes hacer algo con la respuesta aquí si es necesario
                        console.log(response);

                        if(response=="Usuario Autenticado correctamente."){
                            Swal.fire({
                            title: 'Registrado correctamente',
                            imageUrl: 'https://i.pinimg.com/originals/9f/82/9f/9f829f16ffd9b9439937a52136260a9a.jpg', // Cambié la URL a una imagen de 300x300 px
                            imageHeight: 300,
                            imageAlt: 'A tall image'
                            });
                            document.querySelector('button[type="submit"]').removeAttribute('disabled');
                            setTimeout(function() {
                            window.location.href = 'form/index.php'; // Reemplaza 'index.html' con la URL a la que deseas redirigir
                            }, 3000); // 3000 milisegundos = 3 segundos
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Contraseña incorrecta',
                            text: 'Redirigiendo al registro, porfavor vuelva a registrarse',
                            imageUrl: 'https://i.pinimg.com/originals/9f/82/9f/9f829f16ffd9b9439937a52136260a9a.jpg',
                            imageHeight: 300,
                            imageAlt: 'pnp'
                            });
                            setTimeout(function() {
                            window.location.href = 'index.php'; // Reemplaza 'index.html' con la URL a la que deseas redirigir
                            }, 3000); // 3000 milisegundos = 3 segundos
                        }
                        // Redirige a otra página si es necesario
                        //window.location.href = 'nueva_pagina.php';
                    }
                });
            });
        });
    </script>
</body>

<?php include "./components/footer.php"; ?>
</html>
