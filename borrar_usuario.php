<?php
    $id_usuario = $_GET["id"];
    include ("funciones_fit.php");

    // Nos conectamos a la base de datos
    $conexion_usuario = new Conectar_db();

    // realizamos la consulta
    //$query_borrar_usuario = "DELETE FROM usuarios LEFT JOIN pasos ON usuarios.id_usuario=pasos.id_usuario";
    $query_borrar_pasos = "DELETE FROM pasos WHERE pasos.id_usuario = usuarios.id_usuario";
    $consulta_borrar_pasos = $conexion_pasos -> consultar($query_borrar_pasos);
    $query_borrar_usuario = "DELETE FROM usuarios WHERE usuario.id_usuario = $id_usuario";
    $consulta_borrar_usuario = $conexion_usuario -> consultar($query_borrar_usuario);

    // comprobamos si el borrado ha sido exitoso y devolvemos una respuesta para el AJAX
    if($consulta_borrar_usuario) {
        echo "1";   // se ha borrado el usuario
    } else {
        echo "0";   // ha habido algún problema al borrar
    }
    
    // cierro la conexión a la base de datos
    $conexion_usuario -> cerrar();

?>