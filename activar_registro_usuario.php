<?php

include("funciones_fit.php");

$token= $_GET["token"];
$email_usuario= $_GET["email_usuario"];

$conexion_validacion = new conectar_db();

$query_validar_usuario = "UPDATE usuarios SET estado_usuario = 1 WHERE email_usuario ='$email_usuario' AND token = '$token' ";

//Se lanza la consulta
$consulta_validar_usuario = $conexion_validacion->consultar($query_validar_usuario);

if($conexion_validacion->contar_resultados()>0){
    header("location:login_fit.php");
}
else{
    echo"<h1> ERROR. Póngase en contacto con el administrador del sistema</h1>";
}

?>