<?php

$usuario = $_GET["id_usuario"];
$estado= $_GET["estado_usuario"];
include("funciones_fit.php");


$conexion_usuario = new conectar_db();

if($estado==1){
    $query_borrar_usuario="UPDATE usuarios SET estado_usuario = 0 WHERE id_usuario = $usuario";

}
else if($estado==0){
    $query_borrar_usuario="UPDATE usuarios SET estado_usuario = 1 WHERE id_usuario = $usuario";
}

$consulta_borrar_usuario = $conexion_usuario->consultar($query_borrar_usuario);

if($consulta_borrar_usuario){

    header("location:usuarios_fit.php");

}
else {
    echo"<h1> ERROR. Póngase en contacto con el administrador del sistema</h1>";

}

$conexion_usuario->cerrar();

?>