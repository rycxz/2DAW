<?php
include "../modelo/consultas.php";

if(isset($_POST['personajeVer']) && ($_POST['personajeVer'] != "noValido") || isset($_GET['idPersonaje']) ){
    if(isset($_GET['idPersonaje'])){
        $personaje=sacarPersonajeConcreto($_GET['idPersonaje']);
    }elseif($_POST['personajeVer']){
        $personaje=sacarPersonajeConcreto($_POST['personajeVer']);
    }

include "../vista/personaje.php";

}else{

    header("Location: ../controlador/controladorIndex.php");
}
?>
