<?php 
session_start();
include("funciones_fit.php");
comprobar_sesion();
$cursos= cargar_usuarios();
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

    <title>Gamefit : : Añadir Usuario</title>
</head>
<body>

<?php include("header_fit.php"); ?>
    <div class="row justify-content-md-center">
    <h1 class="centrado">Añadir Usuario</h1><br><br><br>
    <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>
    <!-- FORMULARIO -->
    <form id="formulario_add_usuario" method="POST" action="validar_usuario.php" class= "col-6 needs-validation" novalidate >
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre del usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="nombre_usuario_help" required>
            <div id="nombre_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el nombre del usuario.</div>

        <div class="mb-3">
            <label for="apellido1_usuario" class="form-label">Primer apellido del usuario</label>
            <input type="text" class="form-control" id="apellido1_usuario" name="apellido1_usuario" aria-describedby="apellido1_usuario_help" required>
            <div id="apellido1_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el apellido1 del usuario.</div>

        <div class="mb-3">
            <label for="apellido2_usuario" class="form-label">Segundo apellido</label>
            <input type="text" class="form-control" id="apellido2_usuario" name="apellido2_usuario" aria-describedby="apellido2_usuario_help" required>
            <div id="apellido2_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el segundo apellido del usuario.</div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" aria-describedby="fecha_nacimiento_help" required>
            <div id="fecha_nacimiento_help" class="form-text">Introduzca la fecha de nacimiento.</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce la fecha de nacimiento.</div>
        
        <div class="mb-3">
            <label for="email_usuario" class="form-label">Email del usuario</label>
            <input type="text" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="email_usuario_help" required>
            <div id="email_usuario_help" class="form-text">Introduzca el email del usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el email del usuario.</div>

        <div class="mb-3">
            <label for="poblacion_usuario" class="form-label">Poblacion del Usuario</label>
            <input type="number" class="form-control" id="poblacion_usuario" name="poblacion_usuario" aria-describedby="poblacion_usuario_help" required>
            <div id="poblacion_usuario_help" class="form-text">Introduzca la población del Usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce la Provincia del Usuario.</div>
        <div class="mb-3">
            <label for="provincia_usuario" class="form-label">Provincia del Usuario</label>
            <input type="number" class="form-control" id="provincia_usuario" name="provincia_usuario" aria-describedby="provincia_usuario_help" required>
            <div id="provincia_usuario_help" class="form-text">Introduzca la provincia del Usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce la provincia del Usuario.</div>

      
        <div class="mb-3">
            <label for="id_empresa" class="form-label">empresa</label>
            <select class="form-select" id="id_empresa" name="id_empresa" aria-describedby= "id_empresa_help">
                <?php foreach ($empresas as $empresa){?>
                    <option value="<?php echo $empresa["id_empresa"];?>">
                        <?php echo $empresa["nombre_empresa"];?>

                    </option>
                    <?php } ?>


            </select> 
           
            <div id="empresa_usuario_help" class="form-text">Introduzca la empresa del usuario</div>
        </div>

        <div class="invalid-feedback">Por favor, introduce la empresa del usuario.</div>

        <div class="mb-3">
            <label for="estado_usuario" class="form-label">estado del usuario</label>
            <select class="form-select" id="estado_usuario" name="estado_usuario" aria-describedby= "estado_usuario_help">
                <option value="activo">Activo</option>
                <option value="reserva">Reserva</option>
                <option value="inactivo">Inactivo</option>
            </select> 
           
            <div id="estado_usuario_help" class="form-text">Introduzca el estado del usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el estado del usuario.</div>  

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <div>
    <script>
        // FUNCION DE VALIDACION DE ERRORES EN FORMULARIO
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'
    
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
    
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {         

                if(!form.checkValidity()){

                    event.preventDefault()
                    event.stopPropagation()
                }
                    form.classList.add('was-validated')
            }   , false)
        })
    })()
    </script>
</body>
</html>