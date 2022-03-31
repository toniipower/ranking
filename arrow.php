<script src="js/scripts.js"></script>
<script src="validar_pasos.php"></script>




<div class="col-1 <?php
if ($media_pasos_semanales > $media_pasos_semanales_anteriores) {
    echo "arrowgreen";
} else{
    echo "arrowred";
}
?>" id="arrow"><i class="bi bi-arrow-up-circle circulo"></i></div>