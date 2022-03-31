<?php include("funciones_fit.php");
 $provincias = cargar_provincias();
/*  foreach($provincias as $index => $provincia) { 
    echo $provincias[$index]["name"];       
} */
?>

<!DOCTYPE html5>
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
    <title>Registro de Usuario</title>
</head>
<body>

    <div class="row justify-content-md-center">
    <h1 class="centrado">Registro de nuevo usuario</h1><br><br><br>
    <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>

    <form id="formulario_registro" method="POST" action="validar_registro_usuario.php" class= "col-6 needs-validation" novalidate >
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre del Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="nombre_usuario_help" required>
            <div id="nombre_usuario_help" class="form-text">Introduzca su nombre</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce tu nombre.</div>
           
        <div class="mb-3">
            <label for="email_usuario" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="email_usuario_help" required>
            <div id="email_usuario_help" class="form-text">Introduzca su e-mail</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce tu email</div>

        <div class="mb-3">
            <label for="provincia_usuario" class="form-label">Provincia</label>
            <select type="text" class="form-control" id="provincia_usuario" name="provincia_usuario" aria-describedby="provincia_usuario_help" placeholder="Selecciona una provincia.." required>
                <option selected>Selecciona una provincia..</option>
                <?php 
                foreach ($provincias as $key => $value) {
                    foreach($value as $key2 => $value2){        
                ?>
                <option value="<?php echo $value2 ;?>"><?php echo $value2;?></option>
                <?php }}?>
            </select>
            <div id="provincia_usuario_help" class="form-text">Provincia</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce tu email</div>

        <div class="mb-3">
            <label for="fecha_nacimiento_usuario" class="form-label">Fecha nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento_usuario" name="fecha_nacimiento_usuario" aria-describedby="fecha_nacimiento_usuario_help" required>
            <div id="fecha_nacimiento_usuario_help" class="form-text">Fecha nacimiento</div>
        </div>

        <div class="mb-3">
            <label for="password_usuario" class="form-label">Password del usuario</label>
            <input type="password" class="form-control" id="password_usuario" name="password_usuario" aria-describedby="password_usuario_help" required>
            <div id="password_usuario_help" class="form-text">Introduzca su password</div>
        </div>
        <div class="invalid-feedback" id="password_error">Por favor, introduce tu password</div>

        <div class="mb-3">
            <label for="passwordr_usuario" class="form-label">Repita el password del usuario</label>
            <input type="password" class="form-control" id="passwordr_usuario" name="passwordr_usuario" aria-describedby="passwordr_usuario_help" required>
            <div id="passwordr_usuario_help" class="form-text">Los dos password deben ser iguales</div>
        </div>
        <div class="invalid-feedback" id="passwordr_error">Por favor, introduce tu password nuevamente</div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <div>
            <p class="centrado">  <a href="login_fit.php">¿Ya tienes cuenta?</a></p>
        </div>
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
                
                    //validacion de passwords

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

</html5>