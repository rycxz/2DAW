<?php
session_start();
include "../modelo/consultas.php";
    $data = sacarAeropuertos();
    $dataVuelos = sacarVuelos();
    $_SESSION['data']=$data;
    $_SESSION['dataVuelos']=$dataVuelos;
    // creo que esto se podria  meter en un modelo para poder sacar todo de una llamada
  /*  $url = "https://api.aviationstack.com/v1/airports?access_key=009133c08cc1435b8b689bf1f18326dd";
    $urlVuelos = "https://api.aviationstack.com/v1/flights?access_key=009133c08cc1435b8b689bf1f18326dd";
    $JSONstring = @file_get_contents($url);
    $JSONstringVuelos = @file_get_contents($urlVuelos);
        $data = json_decode($JSONstring, true);
        $dataVuelos = json_decode($JSONstringVuelos, true);
*/


    include "../vista/index.php";

?>
