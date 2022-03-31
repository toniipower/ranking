<?php session_start();?>
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
    <?php include("funciones_fit.php");?>

    <title>Login de Usuario</title>
</head>
<body>

<div class="row justify-content-md-center">
<?php


if($_POST){

    $email_usuario = $_POST["email_usuario"];
    $password_usuario = $_POST ["password_usuario"];

    $conexion_login = new conectar_db();
    $query_login = "SELECT * FROM usuarios WHERE email_usuario = '$email_usuario' AND password_usuario = '$password_usuario' AND estado_usuario = 1";
    $consulta_login = $conexion_login->consultar($query_login);

    if($consulta_login->num_rows > 0){

        $resultado_consulta_login= $consulta_login->fetch_all(MYSQLI_ASSOC);
        $_SESSION["tipo_usuario"] = $resultado_consulta_login[0]["tipo_usuario"]; //esto último es para coger el tipo usuario que está dentro de otro array, y poner el 0 es coger el primer lugar. es decir, tengo un array que en el primer lugar 0, hay otro array, y dentro cojo tipo usuario.

        $_SESSION["nombre_usuario"] = $resultado_consulta_login[0]["nombre_usuario"];
        $_SESSION["id_usuario"]     = $resultado_consulta_login[0]["id_usuario"];
        $_SESSION["email_usuario"]  = $email_usuario;

        header("location:index.php");
    }

    //var_dump($consulta_login->num_rows);

    else{

        $query_login_error =  "SELECT estado_usuario FROM usuarios WHERE email_usuario = '$email_usuario' AND password_usuario = '$password_usuario'";        
        $consulta_login_error = $conexion_login->consultar($query_login_error);
        $resultado_login_error= $consulta_login_error->fetch_all(MYSQLI_ASSOC);
        //var_dump($resultado_login_error);
        echo "<br>";
        //var_dump($conexion_login->contar_resultados());
        if($conexion_login->contar_resultados()== 0){
            echo "<h1 style= 'text-align: center;'>El email y el passwordd no coinciden. <a href='login_fit.php'>Volver a la página de login<a/></h1>";
        }
        else{
            echo "<h1 style= 'text-align: center;'>El usuario no ha sido verificado. Por favor revise su email </h1>";

        }
    }
}
?>
</div>
</body>
</html>