<?php
$url = $_SERVER["REQUEST_URI"];
$url_array = explode("/", $url);
$pagina = $url_array[1];
    ?>

<header class="row container-fluid">
   
        <ul class= "menu_principal col-10 nav justify-content-center">
             <li class="nav-item"><a class="nav-link" href="<?php $enlace = $pagina == "empresas_fit.php" ? "#" : "empresas_fit.php"; echo $enlace; ?>">Empresas fit</a></li>

            <li class="nav-item"><a class="nav-link" href="<?php $enlace = $pagina == "pasos_fit.php" ? "#" : "pasos_fit.php"; echo $enlace;?>">Ranking</a></li>

            <li class="nav-item"><a class="nav-link <?php if($_SESSION["tipo_usuario"] !="Administrador"){ echo "disabled";}?>" href="<?php $enlace = $pagina == "usuarios_fit.php" ? "#": "usuarios_fit.php"; echo $enlace; ?>">Usuarios</a></li> <!--tipo usuario no es administrador no va a tener derecho a entrar en el menu de usuario, le añado disable a la clase del "a". Le añade disabled al estilo mediante echo en el lugar de la clase-->
            <li class="nav-item"><a class="nav-link" href="<?php $enlace = $pagina == "perfil_fit.php" ? "#" : "perfil_fit.php"; echo $enlace;?>">Perfil</a></li> <!--inhabilita el enlace para no perder el contenido que el usuario vaya metiendo, si clicka aqui.-->
            <li class="nav-item"><a class="nav-link" href="<?php $enlace = $pagina == "logout_fit.php" ? "#" : "logout_fit.php"; echo $enlace;?>">Cerrar sesión</a></li>

        </ul>

        <div class="saludo_usuario col-2">

            Hola, <?php echo $_SESSION["nombre_usuario"]; ?>

        </div>

    </header>