<?php


function sacarAeropuertos(){
    $url = "https://api.aviationstack.com/v1/airports?access_key=009133c08cc1435b8b689bf1f18326dd";
    $JSONstring = @file_get_contents($url);
    $data = json_decode($JSONstring, true);
    return $data;

}
function sacarVuelos(){
    $urlVuelos = "https://api.aviationstack.com/v1/flights?access_key=009133c08cc1435b8b689bf1f18326dd";
    $JSONstringVuelos = @file_get_contents($urlVuelos);
    $dataVuelos = json_decode($JSONstringVuelos, true);
    return $dataVuelos;

}






?>
