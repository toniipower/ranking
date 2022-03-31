<?php
session_start();
//var_dump($_SESSION["id_usuario"]);
include("funciones_fit.php");
include 'arrow.php';

?>
<script>

    const cambioClase = document.getElementById("arrow");
    console.log(cambioClase)

</script>

<form action="POST" action="pasos_fit.php">
    <input type="hidden" name="num_pasos" id="num_pasos" value= "<?php echo $_SESSION["num"];?>"> 
    <input type="submit">
</form>

<?php

if($_POST){

    $pasos_usuario= $_POST["n_pasos"];
    $datos_usuario= $_POST["id_usuario"];
    /* $_SESSION["num"] = $pasos_usuario; */
    
    //Conexion a la base de datos
    $conexion_pasos = new conectar_db();

    $query_comprobar_pasos= "SELECT DISTINCT id_usuario, n_pasos FROM pasos";
    $consulta_id_usuario_paso= $conexion_pasos->consultar($query_comprobar_pasos);
    $resultado_existe_id_usuario=$consulta_id_usuario_paso->fetch_all(MYSQLI_ASSOC); //cosulta es un objeto y fetch all lo que hace es convertilo a un array asociativo.

    
    foreach ($resultado_existe_id_usuario as $id_usu) {
        if($id_usu["id_usuario"] != $_SESSION["id_usuario"]){
            $query_insertar_pasos = "INSERT INTO pasos (id_pasos, id_usuario, fecha_pasos, n_pasos) VALUES (NULL, '$datos_usuario', NOW(), $pasos_usuario)";
            echo "inserta datos";                               
        }
        else{
            
            if ($pasos_usuario > $id_usu["n_pasos"]) {
                ?> 
                <script>
                    cambioClase.classList.add('arrowgreen')
                    console.log("se ha eliminado la clase")
                </script>
                <?php
            }
            $query_insertar_pasos = "UPDATE pasos SET fecha_pasos = NOW(), n_pasos = $pasos_usuario WHERE pasos.id_usuario = $datos_usuario";
            echo "actualiza datos";
            break;            
        }
    }  
       
    $conexion_insertar_pasos = $conexion_pasos->consultar($query_insertar_pasos);

    $conexion_pasos->cerrar();

    if($conexion_insertar_pasos){

        //A partir de la interrogacion,todas las variables se van a pasar por GET

       header("location:pasos_fit.php");

    }

}

?>