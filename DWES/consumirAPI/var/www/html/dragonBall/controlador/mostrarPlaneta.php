<?php
include "../modelo/consultas.php";
if(isset($_POST['planeta1']) && ($_POST['planeta1'] != "noValido") || isset($_GET['planeta1']) ){
    if(isset($_GET['planeta1'])){
        $planeta=sacarPlanetaSolo($_GET['planeta1']);
    }elseif($_POST['planeta1']){
        $planeta=sacarPlanetaSolo($_POST['planeta1']);
    }

include "../vista/planeta.php";

}else{

    header("Location: ../controlador/controladorIndex.php");
}
?>
