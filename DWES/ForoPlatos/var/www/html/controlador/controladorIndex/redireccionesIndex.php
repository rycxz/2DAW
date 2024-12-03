<?php
 include  ("../../controlador/controadoresUsuarios/sesion.php");

include "../../modelo/receta.php";
include "../../modelo/usuario.php";
include "../../modelo/ingrediente.php";
include "../../modelo/comentarios.php";
control();

//si esta setetado la condicicon del buscador
if(isset($_POST['consulta'])){

// me la guardo
$nombreBuscar = $_POST["consulta"];

// establaezco el numero de pagina
$tamanioPagina=5;

    if(isset($_GET['numPagina'])){
        $numPagina=$_GET['numPagina'];
    }
    else{
        $numPagina=0;
    }
    // saco las recetas que tengo disponibles
$numRecetas=cantidadRecetas();
//lo redeondeo
$maxPagina=floor($numRecetas/$tamanioPagina);

$primeraReceta=$numPagina*$tamanioPagina;


$recetasNombre= sacarRecetasIndexPorPalabra($primeraReceta,$tamanioPagina,$nombreBuscar);
$recetasIngrediente= sacarIngredienteIndexPorPalabra($primeraReceta,$tamanioPagina,$nombreBuscar);

$recetas = array_merge($recetasNombre,$recetasIngrediente);

$recetas = array_map("unserialize", array_unique(array_map("serialize", $recetas)));






// incluyo una vista u otra

//al hacer un header abro la session y miro que hay dentro
if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
  //si esta inciado pues miro si es un admin o no
  $datosUsuario = $_SESSION['usuarioCompleto'];

if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de
//un usuario registrado

include "../../vistas/index/indexAdmin.php";

}

else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {

include "../../vistas/index/indexLogged.php";

}



}
else{
  //si no cumple ningua de mis condiciones lo mando a n o logged
  include ' ../../vistas/index/indexNoLogged.php';
  exit();
}





}else{

$tamanioPagina=5;

if(isset($_GET['numPagina'])){

  $numPagina=$_GET['numPagina'];
}
else{

  $numPagina=0;
}

$numRecetas=cantidadRecetas();
  //estabzezco el maximo de recetas por pagina
$maxPagina=floor($numRecetas/$tamanioPagina);

$primeraReceta=$numPagina*$tamanioPagina;
  //saco todas las recetas con sus atibutos
$recetas=sacarRecetasIndex($primeraReceta,$tamanioPagina);

//al hacer un header abro la session y miro que hay dentro
if (isset($_SESSION["loggeado"]) && isset($_SESSION["nombreUsuario"])) {
  //si esta inciado pues miro si es un admin o no
  $datosUsuario = $_SESSION['usuarioCompleto'];

if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] && $datosUsuario['esAdmin'] == 1) {
//aqui lo que hago es si esta logeado y compruebo el nombre de usuario entonces le muestro el index de
//un usuario registrado




include "../../vistas/index/indexAdmin.php";

}

else if ( ($_SESSION["loggeado"] == true) && $_SESSION["nombreUsuario"] == $datosUsuario['nickname'] ) {

//aqui mostraria el html de los admins
include "../../vistas/index/indexLogged.php";

}


}
else{
  //si no cumple ningua de mis condiciones lo mando a n o logged
  include "../../vistas/index/indexNoLogged.php";
  exit();
}


}

?>

