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

    <!-- Asi se incluye un archivo php dentro de otro archivo php -->
    <?php include("funciones_fit.php");?>

    <title>Login de Usuario</title>
</head>
<body>

  <div class="row justify-content-md-center">
  <h1 class="centrado">Login de usuario</h1><br><br><br>
  <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>

  <form id="formulario_registro" method="POST" action="validar_login_fit.php" class= "col-6 needs-validation" novalidate >      
    <div class="mb-3">
        <label for="email_usuario" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="email_usuario_help" required>
        <div id="email_usuario_help" class="form-text">Introduzca su e-mail</div>
    </div>
    <div class="invalid-feedback">Por favor, introduce tu email</div>

    <div class="mb-3">
        <label for="password_usuario" class="form-label">Password del usuario</label>
        <input type="password" class="form-control" id="password_usuario" name="password_usuario" aria-describedby="password_usuario_help" required>
        <div id="password_usuario_help" class="form-text">Introduzca su password</div>
    </div>
    <div class="invalid-feedback" id="password_error">Por favor, introduce tu password</div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  <div>
    <p class="centrado">  <a href="registro_usuario.php">¿Aún no tienes cuenta?</a></p>
  </div>
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
            }, false)
          })
      })()
  </script>
</body>

</html>