<?php

include("funciones_fit.php");?>

<?php

if($_POST){

    //var_dump($_POST);
    $email_usuario= $_POST["email_usuario"];
    $id_usuario = $_POST["id_usuario"];
    $password_usuario= $_POST["password_usuario"];    

    //Conexion a la base de datos

    $conexion_actualizar = new conectar_db();
    $query_actualizar_perfil = "UPDATE usuarios 
    SET email_usuario = '$email_usuario',  
    password_usuario='$password_usuario'
    WHERE id_usuario = $id_usuario"; //la id va sin comillas pq es un número.


    $conexion_actualizar_perfil= $conexion_actualizar->consultar($query_actualizar_perfil);    
    //Esto es para cerrar la sesion
    if($conexion_actualizar->contar_resultados()>0){

        $conexion_actualizar->cerrar();
        header ("location:perfil_fit.php");        

    }  
}

?>