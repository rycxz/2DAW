<?php
include "../modelo/consultas.php";
$personajes = sacarPersonajes();
$planetas =sacarPlanetas();

if(isset($_POST['batallaPersonajes'])){
    header( "Locatiion: ../controlador/batallaPersonajes.php");
}
else if(isset($_POST['mostrarPersonaje'])){
    header( "Locatiion: ../controlador/mostrarPersonaje.php");

}
elseif(isset($_POST['mostrarPlantea'])){
    header( "Locatiion: ../controlador/mostrarPlaneta.php");
}
else{
    include "../vista/index.php";
}
?>
