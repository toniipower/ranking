<?php
session_start();
include("funciones_fit.php");

if($_POST){

    var_dump($_POST);

    $nombre_usuario    = $_POST["nombre_usuario"];
    $apellido1_usuario = $_POST["apellido1_usuario"];
    $apellido2_usuario = $_POST["apellido2_usuario"];
    $email_usuario     = $_POST["email_usuario"];
    $fecha_nacimiento  = $_POST["fecha_nacimiento"];
    $provincia_usuario = $_POST["provincia_usuario"];
    $id_empresa        = $_POST["id_empresa"];
    $estado_usuario    = $_POST["estado_usuario"];
    $id_usuario        = $_POST["id_usuario"];   

    //Conexion a la base de datos

    $conexion_usuario = new conectar_db();    

    $query_editar_usuario = "UPDATE usuarios SET 
    nombre_usuario    = '$nombre_usuario',
    apellido1_usuario = '$apellido1_usuario',
    apellido2_usuario = '$apellido2_usuario',
    email_usuario     = '$email_usuario',
    fecha_nacimiento  = '$fecha_nacimiento',
    provincia_usuario = '$provincia_usuario',
    id_empresa        = $id_empresa,
    estado_usuario    = $estado_usuario 
    WHERE `usuarios`.`id_usuario` = $id_usuario"; 

    $conexion_editar_usuario = $conexion_usuario->consultar($query_editar_usuario);
    
    $conexion_usuario->cerrar();

    if($conexion_editar_usuario){
        header("location:usuarios_fit.php");
    }
}

?>