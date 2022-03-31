<?php session_start();
include("funciones_fit.php");
$datos_usuario = cargar_datos_usuario($_SESSION["id_usuario"]);
comprobar_sesion();
$pasos = cargar_pasos();
/* var_dump($pasos); */

var_dump($_SESSION); 
if ($_POST) {
  $_SESSION["num"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylehd.css">
  <title>Ranking</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <!-- <script src="validar_pasos.php"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Gamefit : : Ranking</title>
</head>
</head>
<body>
  
<?php include("header_fit.php");?>

  <div id="container"><!-- 1 -->
    <div class="row justify-content-md-center"><!-- 2 -->
      <h1 class="centrado"> Ranking </h1>
      <a href="add_pasos.php" class="btn btn-primary col-2" role="button"> Añadir mis pasos</a>
      <div class="modulo_1"><!-- 3 -->
        <div class="contenedor_grey"><!-- 4 -->
          <!-- img encabezada--> Imagen
          <h3 class="h3">Ranking general | <span class="letterblue">Liga individual Marzo 2022 </span><span class="minletter">+ info </span></h3>                
          <div class="underline"></div>
          <?php foreach ($pasos as $indice => $paso){?>                       
          <div class="rank">
            <div class="darkgray row" id="cover">
              <div class="col-2 number">
                <div>
                  <?php 
                    echo $indice+1;
                  ?>
                </div>
                <div><i class="bi bi-person-circle avatar"></i></div>
              </div>
              <div class="col-6 personal">
                <h2><?php echo $paso["nombre_usuario"] .' '. $paso["apellido1_usuario"]; ?></h2>                           
                  <p>Equipo: Santander</p>
                  <p>Hándicap: 9</p>
                  <i class="bi bi-heart-fill corazon"></i>
                  <i class="bi bi-chat-left-fill bocadillo"></i>
                  <i class="bi bi-lightning-charge-fill rayo"></i>
              </div>
              <div class="col-3 actividad"><span class="pasos"> <?php echo $paso["n_pasos"]; ?> </span> <span class="walk"> pasos</span> <br> <span class="sync"><p>Última Sync: <?php echo $paso["fecha_pasos"]; ?></p></span></div>
              <div class="col-1 <?php
                if ($_SESSION["num"] < $paso["n_pasos"]) {
                  echo "arrowgreen";
                } else{
                  echo "arrowred";
                }
                ?>" id="arrow"><i class="bi bi-arrow-up-circle circulo"></i>
              </div>
            </div>
          </div>

          <?php } ?>

          <div class="pages">Nº páginas</div>        
        </div><!-- 4 -->
      </div><!-- 3 -->
    </div><!-- 2 -->
  </div> <!-- 1 -->
    <script>

    /* Intento de cambiar la clase de la flecha de verde a roja a través de js, solo cambia la primera */
      const cambioClase= document.querySelector("#arrow");
      console.log(cambioClase)

      cambioClase.addEventListener("click", ()=> {
        cambioClase.classList.toggle("arrowred")
        cambioClase.classList.toggle("arrowgreen")
      })
    </script>
  </div>
</body>
</html>