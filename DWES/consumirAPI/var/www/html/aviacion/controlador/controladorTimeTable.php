<?php
session_start();
$data=$_SESSION['data'];
$dataVuelos=$_SESSION['dataVuelos'];
$aeropuertoInfor;
if(isset($_POST['airport'])){
    //aqui saco la informacion del aeropuerto que ha  seleccionado el usuario
    foreach ($data as $key => $valor) {
        if (is_array($valor)) {
            foreach ($valor as $aeropuerto) {
                if (isset($aeropuerto['airport_name'])) {
                            if (strcmp($_POST['airport'], $aeropuerto['airport_name']) === 0) {
                                $aeropuertoInfor = $aeropuerto;
                            }

                }
            }
        }
    }
    /*var_dump($aeropuertoInfor);
    exit();
    */
 //aqui ya tengo el aeropuertoInfor con toda la infromacion que me hace falta del aeropuerto del usuario
    //me la podria haber enviado con un GET solo la informacion del aeropuerto seleccionado pero he prefierdio hacerlo asi

    //lo siguiente hay que sacar informacion de los vuelos que llegan a ese areopuerto
    $vuelosLlegadas = [];
    $vuelosSalidas = [];
     $codigoIATA = $aeropuertoInfor['iata_code']; // codigo IATA del aeropuerto
      //$codigoIATA = "MEL"; // codigo IATA del aeropuerto

    if (isset($dataVuelos['data']) && is_array($dataVuelos['data'])) {
        foreach ($dataVuelos['data'] as $vuelo) {
            if (isset($vuelo['arrival']['iata'], $vuelo['departure']['iata'])) {
                // llegan
                if (strcasecmp(trim( $vuelo['arrival']['iata']), trim($codigoIATA)) === 0) {
                    $vuelosLlegadas[] = $vuelo;
                }
                //  salen
                if (strcasecmp(trim($vuelo['departure']['iata']), trim($codigoIATA)) === 0) {
                    $vuelosSalidas[] = $vuelo;
                }
            }
        }
    }

    include "../vista/timetable.php";

}

else{
    header("Location: controladorIndex.php?errorAeropuerto=true");
}
?>
