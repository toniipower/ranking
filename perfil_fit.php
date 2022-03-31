<?php 
session_start();
include("funciones_fit.php");
comprobar_sesion();
$datos_usuario = cargar_datos_usuario($_SESSION["id_usuario"]); //parametro que vamos a meter para que busque al usuario por el email.
//var_dump($datos_usuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>   

    <title>Gamefit : : Perfil</title>
</head>
<body>
    
    <?php include("header_fit.php"); ?>
    <div class="row justify-content-md-center">

        <h1 class="centrado">Editar perfil</h1><br><br><br>

        <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>

        <form id="formulario_registro" method="POST" action="actualizar_perfil_fit.php" class= "col-6 needs-validation" novalidate >
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Nombre del Usuario</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="nombre_usuario_help" disabled value="<?php echo $datos_usuario["nombre_usuario"];?>"><!--disabled en lugar de required para que el usuario no pueda cambiar su nombre en el perfil de su cuenta-->
                <div id="nombre_usuario_help" class="form-text">Introduzca su nombre</div>
            </div>
            <div class="invalid-feedback">Por favor, introduce tu nombre.</div>

            <div class="mb-3">
                <label for="apellido1_usuario" class="form-label">Primer apellido del Usuario</label>
                <input type="text" class="form-control" id="apellido1_usuario" name="apellido1_usuario" aria-describedby="apellido1_usuario_help" disabled value="<?php echo $datos_usuario["apellido1_usuario"];?>">
                <div id="apellido1_usuario_help" class="form-text">Introduzca su primer apellido</div>
            </div>
            <div class="invalid-feedback">Por favor, introduce tu primer apellido.</div>

            <div class="mb-3">
                <label for="apellido2_usuario" class="form-label">Segundo apellido del Usuario</label>
                <input type="text" class="form-control" id="apellido2_usuario" name="apellido2_usuario" aria-describedby="apellido2_usuario_help" disabled value="<?php echo $datos_usuario["apellido2_usuario"];?>">
                <div id="apellido2_usuario_help" class="form-text">Introduzca su segundo apellido</div>
            </div>
            
            
            <div class="mb-3">
                <label for="email_usuario" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="email_usuario_help" required value="<?php echo $datos_usuario["email_usuario"];?>">
                <div id="email_usuario_help" class="form-text">Introduzca su e-mail</div>
            </div>
            <div class="invalid-feedback">Por favor, introduce tu email</div>

            <div class="mb-3">
                <label for="password_usuario" class="form-label">Password del usuario</label>
                <input type="password" class="form-control" id="password_usuario" name="password_usuario" aria-describedby="password_usuario_help" required value="<?php echo $datos_usuario["password_usuario"];?>">
                <div id="password_usuario_help" class="form-text">Introduzca su password</div>
            </div>
            <div class="invalid-feedback" id="password_error">Por favor, introduce tu password</div>

            <div class="mb-3">
                <label for="passwordr_usuario" class="form-label">Repita el password del usuario</label>
                <input type="password" class="form-control" id="passwordr_usuario" name="passwordr_usuario" aria-describedby="passwordr_usuario_help" required value="<?php echo $datos_usuario["password_usuario"];?>">
                <div id="passwordr_usuario_help" class="form-text">Los dos password deben ser iguales</div>
            </div>
            <div class="invalid-feedback" id="passwordr_error">Por favor, introduce tu password nuevamente</div>

                <input type="hidden" name="id_usuario" id="id_usuario" value= "<?php echo $datos_usuario["id_usuario"];?>">

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <div>
    <script>
        // FUNCION DE VALIDACION DE ERRORES EN FORMULARIO
        // Example starter JavaScript for disabling form submissions if there are invalid fields. Ejemplo de JavaScript de inicio para deshabilitar el envío de formularios si hay campos no válidos.
        (function () {
            'use strict'
        
            // Fetch all the forms we want to apply custom Bootstrap validation styles to. Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados.
            var forms = document.querySelectorAll('.needs-validation')
        
            // Loop over them and prevent submission. Bucle sobre ellas y evitar la presentación.
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {

                if (document.getElementById("password_usuario").value != document.getElementById("passwordr_usuario").value) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("passwordr_error").style.display= "block";
                document.getElementById("passwordr_error").value= "";
                document.getElementById("passwordr_error").value= "";
                }
                else{
                document.getElementById("passwordr_error").style.display="none";
                }
                if(!form.checkValidity()){

                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
        })()
  </script>
</body>
</html>