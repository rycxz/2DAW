<?php
if(isset($_POST['timetable'])){
    if(isset($_GET['aeropuerto'])){
        $aeropuerto= $_POST['airport'];
    }
    else{
        header("Location: ../controlador/controladorIndex.php?errorAeropuerto=true");
    }
}
elseif(isset($_GET['mapaDeUnAvion'])){
    if(isset($_GET['seguirAvion'])){
        $avion= $_GET['seguirAvion'];
        //duda si con el avion yo puedo consultar depues sus coordenadas
    }
    else{
        header("Location:  ../controlador/controladorIndex.php?errorAvion=true");
    }
}
else{
    include "../vista/index.php";
}
?>
