<?php 
session_start();
$id_usuario    = $_GET["id_usuario"];
include("funciones_fit.php");
comprobar_sesion();
$datos_usuario = cargar_datos_usuario($id_usuario);
$empresas      = cargar_empresas();
$provincias    = cargar_provincias();
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

    <!-- Asi se incluye un archivo php dentro de otro archivo php -->   

    <title>Gamefit : : Editar Usuario</title>
</head>
<body>
    <?php include("header_fit.php"); ?>    

    <div class="row justify-content-md-center">
    <h1 class="centrado">Editar usuario</h1><br><br><br>
    <h4 class="centrado">*todos los campos son obligatorios</h4><br><br><br>
    <form id="formulario_add_usuario" method="POST" action="actualizar_usuario.php" class= "col-6 needs-validation" novalidate >
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre del usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" aria-describedby="nombre_usuario_help" required value="<?php echo $datos_usuario['nombre_usuario'];?>"> 
            <div id="nombre_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el nombre del usuario.</div>

        <div class="mb-3">
            <label for="apellido1_usuario" class="form-label">Primer apellido del usuario</label>
            <input type="text" class="form-control" id="apellido1_usuario" name="apellido1_usuario" aria-describedby="apellido1_usuario_help" required value="<?php echo $datos_usuario['apellido1_usuario'];?>">
            <div id="apellido1_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el apellido1 del usuario.</div>

        <div class="mb-3">
            <label for="apellido2_usuario" class="form-label">apellido2 del usuario</label>
            <input type="text" class="form-control" id="apellido2_usuario" name="apellido2_usuario" aria-describedby="apellido2_usuario_help" required value="<?php echo $datos_usuario['apellido2_usuario'];?>">
            <div id="apellido2_usuario_help" class="form-text">Introduzca el usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el apellido2 del usuario.</div>

        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento del usuario</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" aria-describedby="fecha_nacimiento_help" required value="<?php echo $datos_usuario['fecha_nacimiento'];?>">
            <div id="fecha_nacimiento_help" class="form-text">Introduzca la Fecha de nacimiento del usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el dni del usuario.</div>
        
        <div class="mb-3">
            <label for="email_usuario" class="form-label">email del usuario</label>
            <input type="text" class="form-control" id="email_usuario" name="email_usuario" aria-describedby="email_usuario_help" required value="<?php echo $datos_usuario['email_usuario'];?>">
            <div id="email_usuario_help" class="form-text">Introduzca el email del usuario</div>
        </div>
        <div class="invalid-feedback">Por favor, introduce el email del usuario.</div>

        <div class="mb-3">
            <label for="provincia_usuario" class="form-label">Provincia del usuario</label>
            <select type="text" class="form-control" id="provincia_usuario" name="provincia_usuario" aria-describedby="provincia_usuario_help" placeholder="Selecciona una provincia.." required>
                <option > </option>
                <option > Selecciona..</option>
                <option selected> <?php echo $datos_usuario["provincia_usuario"] ?> </option>
                <?php 
                foreach ($provincias as $key => $value) {
                    foreach($value as $key2 => $value2){        
                ?>
                <option value="<?php echo $value2 ;?>"><?php echo $value2;?></option>
                <?php }}?>
            </select>
        </div>
        <div class="invalid-feedback">Por favor, introduce la provincia del usuario.</div>
      
        <div class="mb-3">
            <label for="id_empresa" class="form-label">Empresa del usuario</label>
            <select class="form-select" id="id_empresa" name="id_empresa" aria-describedby= "id_empresa_help" >
                <?php foreach ($empresas as $empresa){?>
                    <option value="<?php echo $empresa["id_empresa"];?>"   <?php if($empresa["id_empresa"]==$datos_usuario["id_empresa"]){echo "selected";}?>>
                        <?php echo $empresa["nombre_empresa"];?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="invalid-feedback">Por favor, introduce la empresa del usuario.</div>

        <div class="mb-3">
            <label for="estado_usuario" class="form-label">estado del usuario</label>
            <select class="form-select" id="estado_usuario" name="estado_usuario" aria-describedby= "estado_usuario_help">
                <option value = "1"   <?php if ($datos_usuario["estado_usuario"] == 1){echo "selected";}?>>Activo</option>
                <option value = "0"   <?php if ($datos_usuario["estado_usuario"] == 0){echo "selected";}?>>Inactivo</option>
            </select> 
           
            <div id="estado_usuario_help" class="form-text">Introduzca el estado del usuario</div>
        </div>

        <div class="invalid-feedback">Por favor, introduce el estado del usuario.</div>       
        <!-- Campo hidden con la ID USUARIO -->
        <input type="hidden" name="id_usuario" id = "id_usuario" value="<?php echo $datos_usuario['id_usuario'];?>">
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