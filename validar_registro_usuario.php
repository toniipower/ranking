<?php
include("funciones_fit.php");

if($_POST){

    var_dump($_POST);

    $nombre_usuario = $_POST["nombre_usuario"];
    $email_usuario = $_POST["email_usuario"];
    $provincia = $_POST["provincia_usuario"];
    $password_usuario = $_POST["password_usuario"];
    $passwordr_usuario = $_POST["passwordr_usuario"];
    $fecha_nacimiento = $_POST["fecha_nacimiento_usuario"];
    /* $apellido1_usuario= $_POST["apellido1_usuario"];
    $apellido2_usuario= $_POST["apellido2_usuario"]; */
    /* $id_usuario= $_POST["id_usuario"];*/
    //$pasos = $_POST["id_pasos"]; 

    var_dump($provincia);


    //Generar token
    $token = rand(0, 999999);

    //Conexion a la base de datos

    $conexion_registro = new conectar_db();

    $query_insertar_usuario = 
    "INSERT INTO usuarios 
    (nombre_usuario, 
    email_usuario, 
    provincia_usuario, 
    fecha_nacimiento, 
    password_usuario, 
    tipo_usuario, 
    estado_usuario, 
    token,
    apellido1_usuario,
    apellido2_usuario) VALUES 
    ('$nombre_usuario', 
    '$email_usuario',
    '$provincia',
    '$fecha_nacimiento',
    '$password_usuario',
    'usuario',
    0,
    '$token',
    '',
    '')";


    $conexion_insertar_usuario = $conexion_registro->consultar($query_insertar_usuario);
    
    /*if($conexion_insertar_usuario == 1){
        $query_insertar_usuario= "INSERT INTO pasos (id_pasos) VALUES ($pasos)";

        $conexion_insertar_usuario2 = $conexion_registro->consultar($query_insertar_usuario);     
    }
        else{
            echo "Algo va mal en la Base de Datos";
        }
     */
        //IMP PROBAR CON ESTO https://www.w3schools.com/sql/sql_insert_into_select.asp
    //Esto es para cerrar la sesion

    $conexion_registro->cerrar();

    if($conexion_insertar_usuario){

        //A partir de la interrogacion,todas las variables se van a pasar por GET y luego con &

        header("location:activar_registro_usuario.php?token=$token&email_usuario=$email_usuario");

    }
}

?>
