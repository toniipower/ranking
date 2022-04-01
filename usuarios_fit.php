<?php session_start();
include("funciones_fit.php");
comprobar_sesion();
$usuarios = cargar_usuarios();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">

    <!-- Asi se incluye un archivo php dentro de otro archivo php -->
   

    <title>Gamefit : : Usuarios</title>
</head>
<body>

   
<?php include("header_fit.php"); ?>

    <div class="row justify-content-md-center">

        <h1 class="centrado"> Listado de Usuarios</h1>
        <a href="add_usuario.php" class="btn btn-primary col-2" role="button"> Añadir usuario</a>
        <table class="table table-striped table-hover">

            <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Población</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Estado</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario){?>
                <tr>
                    
                    
                    
                    <td><?php echo $usuario["nombre_usuario"]; ?> </td> <!--para incorporar el contenido de la base de datos a nuestra tabla, se hace de esta manera.-->
                    <td><?php echo $usuario["apellido1_usuario"]. " " . $usuario["apellido2_usuario"]; ?></td>
                    <td><?php echo $usuario["email_usuario"]; ?></td>
                    <td><?php echo $usuario["fecha_nacimiento"]; ?></td>
                    <td><?php echo $usuario["poblacion_usuario"]; ?></td>
                    <td><?php echo $usuario["provincia_usuario"]; ?></td>
                    <td><?php echo $usuario["estado_usuario"]; ?></td>
                    <td> 
                        <a href= "editar_usuario.php?id_usuario=<?php echo $usuario["id_usuario"];?>" class="btn btn-warning bi bi-pencil" role="button"></a>
                        <!-- <a href= "incidencias_alumno.php?id_alumno=<?php /* echo $alumno["id_alumno"]; */?>" class="btn btn-success bi bi-card-list" role="button"></a> -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target= "#modelId<?php echo $usuario["id_usuario"];?>" role="button" class="btn btn-primary"> <?php if($usuario["estado_usuario"]==1){echo "Desactivar";} else{ echo "Activar";}
                               ?> </button>
                        
                    </td>
                </tr>
                    
                 <!-- Modal -->
                 <div class="modal fade" id="modelId<?php echo $usuario['id_usuario'];?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content delete_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><!--<img class="modal_image" src="img/warning.png">-->  Advertencia </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                       ¿Está seguro de que desea desactivar el usuario <span><?php echo $usuario["nombre_usuario"];?></span>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                        <a href= "actualizar_estado_usuario.php?id_usuario=<?php echo $usuario['id_usuario']?>&estado_usuario=<?php echo $usuario['estado_usuario'];?>" class="btn btn-danger" role="button">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            
            </tbody>


        </table>
    </div>
</body>

</html>