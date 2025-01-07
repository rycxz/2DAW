<?php
include "../modelo/consultas.php";

if((isset($_POST['personaje1']) && isset($_POST['personaje2']) ) && ($_POST['personaje1'] != "noValido" && $_POST['personaje2'] != "noValido" )){
$personaje1=sacarPersonajeConcreto($_POST['personaje1']);
$personaje2=sacarPersonajeConcreto($_POST['personaje2']);
include "../vista/batalla.php";

}else{

    header("Location: ../controlador/controladorIndex.php");
}

?>
