<?php
include("funciones_fit.php");

if($_POST){

    //var_dump($_POST);

    $nombre_usuario= $_POST["nombre_usuario"];
    $apellido1_usuario= $_POST["apellido1_usuario"];
    $apellido2_usuario= $_POST["apellido2_usuario"];
    $email_usuario= $_POST["email_usuario"];
    $fecha_nacimiento= $_POST["fecha_nacimiento"];
    $poblacion_usuario= $_POST["poblacion_usuario"];
    $provincia_usuario= $_POST["provincia_usuario"];
    $id_empresa= $_POST["id_empresa"];
    $estado_usuario= $_POST["estado_usuario"];
 
    $conexion_usuario = new conectar_db();

    $query_insertar_usuario = "INSERT INTO usuarios (nombre_usuario, apellido1_usuario, apellido2_usuario, 
    email_usuario, fecha_nacimiento, poblacion_usuario, provincia_usuario, id_empresa, estado_usuario)
    VALUES('$nombre_usuario', '$apellido1_usuario', '$apellido2_usuario', 
    '$email_usuario', '$fecha_nacimiento',$poblacion_usuario, $provincia_usuario, $id_empresa, '$estado_usuario')";

    $conexion_insertar_usuario = $conexion_usuario->consultar($query_insertar_usuario);

    $conexion_usuario->cerrar();

    if($conexion_insertar_usuario){

        header("location:usuarios_fit.php");
    }
}

?>