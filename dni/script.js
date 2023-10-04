 
document.getElementById('consultar').setAttribute('disabled', 'true');
document.getElementById('registro').setAttribute('disabled', 'true');

document.addEventListener('DOMContentLoaded', function() {
    var correo = document.getElementById('correo');
    var dni = document.getElementById('dni');
    var nombre = document.getElementById('nombre');
    var apellidoPaterno = document.getElementById('apellidoPaterno');
    var apellidoMaterno = document.getElementById('apellidoMaterno');
    var registroBtn = document.getElementById('registro');

    function validarCampos() {
        if (correo.value !== '' &&
            dni.value !== '' &&
            nombre.value !== '' &&
            apellidoPaterno.value !== '' &&
            apellidoMaterno.value !== '') {
            registroBtn.removeAttribute('disabled');
        } else {
            registroBtn.setAttribute('disabled', 'true');
        }
    }

    correo.addEventListener('input', validarCampos);
    dni.addEventListener('input', validarCampos);
    nombre.addEventListener('input', validarCampos);
    apellidoPaterno.addEventListener('input', validarCampos);
    apellidoMaterno.addEventListener('input', validarCampos);

    // Deshabilitar el botón al cargar la página
    registroBtn.setAttribute('disabled', 'true');
});


document.getElementById('dni').addEventListener('input', function() {
    var dniValue = this.value;
    var cantidadDigitos = dniValue.length;

    if(cantidadDigitos === 8){
        document.getElementById('consultar').removeAttribute('disabled');
    } else {
        document.getElementById('consultar').setAttribute('disabled', 'true');
    }
});


//botón consultar 
document.getElementById('consultar').addEventListener('click', function(event) {
    event.preventDefault();

    setTimeout(function() {
        var validate = document.getElementById('modal').innerHTML;
        var dni = document.getElementById('dni').value;
        var xhr = new XMLHttpRequest();

        if(validate != 1){
            xhr.open('GET', 'consulta_dni.php?dni=' + dni, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var data = JSON.parse(xhr.responseText);

                    if (data.success) {
                        var resultDiv = document.getElementById('result');
                        document.getElementById("nombre").value = data.data.nombres;
                        document.getElementById("apellidoPaterno").value = data.data.apellido_paterno;
                        document.getElementById("apellidoMaterno").value = data.data.apellido_materno;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: 'Error al consultar el DNI. Por favor, verifica el número ingresado.'
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: 'Error al conectar con el servidor. Por favor, intenta nuevamente.'
                    })
                }
            };

            xhr.onerror = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: 'Error al conectar con el servidor. Por favor, intenta nuevamente.'
                })
            };

            xhr.send();
        }
    }, 500); // Agregamos un retraso de 2 segundos (2000 milisegundos)
});


document.getElementById('dniForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var correo = document.getElementById('correo').value;
    var dni = document.getElementById('dni').value;
    var nombre = document.getElementById('nombre').value;
    var apellidoPaterno = document.getElementById('apellidoPaterno').value;
    var apellidoMaterno = document.getElementById('apellidoMaterno').value;
    var codigo = Math.floor(100000 + Math.random() * 900000);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'registro_cliente.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // La inserción fue exitosa
            console.log(xhr.responseText);
        } else {
            // Hubo un error en la inserción
            console.error('Error al insertar los datos.');
        }
    };
    xhr.onerror = function () {
        console.error('Error de red al intentar insertar los datos.');
    };
    
    var params = 'correo=' + correo + '&dni=' + dni + '&nombre=' + nombre + '&apellidoPaterno=' + apellidoPaterno + '&apellidoMaterno=' + apellidoMaterno + '&codigo=' + codigo;
    xhr.send(params);

   emailjs.send("service_zo1704r","template_91xvbqo",{
    usuario: nombre + " " + apellidoPaterno+" "+ apellidoMaterno,
    company: "BruCorp©",
    sendToken: codigo,
    correo: correo,
    });

    // Espera 3 segundos antes de iniciar la redirección
    setTimeout(function() {

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Se redirigirá en 3 segundos.',
            showConfirmButton: false,
            timer: 800
          })
        
        // Espera un segundo antes de redirigir
        setTimeout(function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Se redirigirá en 2 segundos.',
                showConfirmButton: false,
                timer: 800
              })
            
            // Espera otro segundo antes de redirigir
            setTimeout(function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Se redirigirá en 1 segundos.',
                    showConfirmButton: false,
                    timer: 800
                  })
                
                // Redirige a validate.php
                window.location.href = "validate.php";
            }, 1000);
        }, 1000);
    }, 3000);
});
