<?php 
session_start();
include("funciones_fit.php");
comprobar_sesion();
$datos_usuario = cargar_datos_usuario($_SESSION["id_usuario"]);
$pasos= cargar_pasos();
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
  
    <title>Gamefit: : Añadir pasos</title>
</head>
<body>

<?php include("header_fit.php"); ?>
    <div class="row justify-content-md-center">

    <h1 class="centrado">Añadir pasos</h1><br><br><br>

    <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>

    <form id="formulario_add_pasos" method="POST" action="validar_pasos.php" class= "col-6 needs-validation" novalidate >        

        <div class="mb-3">
            <label for="n_pasos" class="form-label">Pasos realizados</label>
            <input type="number" class="form-control" id="n_pasos" name="n_pasos" aria-describedby="n_pasos_help" required>
            <div id="n_pasos_help" class="form-text">Introduzca sus pasos</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce sus pasos realizados.</div>        
        <input type="hidden" name="id_usuario" id="id_usuario" value= "<?php echo $datos_usuario["id_usuario"];?>">
        <button type="submit" class="btn btn-primary">Submit</button>
        <div>
    </form>
    <form action="">

    </form>
    
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