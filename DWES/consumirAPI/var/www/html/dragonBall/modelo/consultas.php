<?php
function sacarPersonajes(){
    $url ="https://dragonball-api.com/api/characters?limit=700";
    $JSONstring = @file_get_contents($url);
    $data = json_decode($JSONstring, true);
    return $data;

}
function sacarPersonajeConcreto($id){
    $url ="https://dragonball-api.com/api/characters/$id";
    $JSONstring = @file_get_contents($url);
    $data = json_decode($JSONstring, true);
    return $data;

}
function sacarPlanetas(){
    $url ="https://dragonball-api.com/api/planets?limit=20";
    $JSONstring = @file_get_contents($url);
    $data = json_decode($JSONstring, true);
    return $data;

}
function sacarPlanetaSolo($id){
    $url ="https://dragonball-api.com/api/planets/$id";
    $JSONstring = @file_get_contents($url);
    $data = json_decode($JSONstring, true);
    return $data;

}



?>
