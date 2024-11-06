<?php
session_start();
/*
Ejercicio 4: Carrito de compras simple con sesiones

Crea una página web que simule un carrito de compras básico. Los productos deben estar definidos en un array y los usuarios deben poder agregar productos al carrito usando sesiones.

Además, debe haber una página donde el usuario pueda ver los productos que ha agregado. Permite al usuario agregar varios productos y ver un resumen del carrito. 

Proporciona la opción de eliminar productos del carrito y vaciar el carrito por completo.*/


$productosA = array(

    "pera" => ["precio" => "85", "edad" => "75" ],
    "manzana" =>  ["precio" => "105", "edad" => "57" ],
    "limon" =>  ["precio" => "175", "edad" => "25" ],
    "pepe" =>  ["precio" => "5", "edad" => "59" ],  
      "peraa" => ["precio" => "85", "edad" => "75" ],
    "manzsana" =>  ["precio" => "105", "edad" => "57" ],
    "limson" =>  ["precio" => "175", "edad" => "25" ],
    "pespe" =>  ["precio" => "5", "edad" => "59" ]

);

    if ( isset( $_POST["enviar"] ) ){

        if ( !isset($_SESSION[$_POST["opcion"]] ) ){

            $_SESSION[$_POST["opcion"]] = 1;

        } else {

            $_SESSION[$_POST["opcion"]]  = $_SESSION[$_POST["opcion"]] + 1 ;

        }


    }


    if ( isset( $_POST["borrar"] ) ){

        if ( !isset($_SESSION[$_POST["opcion"]] ) ){

            $_SESSION[$_POST["opcion"]] = 1;

        } else {

            $_SESSION[$_POST["opcion"]]  = $_SESSION[$_POST["opcion"]] - 1 ;

        }


    }



    if ( isset( $_SESSION) ){

        foreach ( $_SESSION as $sesion => $cantidad){

            echo ($sesion." a cantidad de ".$cantidad."<br>");

        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>carrito</h1>

    <form action="ejercicio4.php" method="post">

    <?php

    foreach ($productosA as $producto => $datos){

echo ( "    $producto  <input type='radio' name='opcion' value='$producto'><br> " );

    }



    ?>

 
  <input type="submit" name="enviar" value="enviar">
  <input type="submit" name="borrar" value="borrar">

    </form>
    
</body>
</html>