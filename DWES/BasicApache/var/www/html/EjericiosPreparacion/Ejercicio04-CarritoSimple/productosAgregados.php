<?php
include "listaProductos.php";
session_start();
if(isset($_POST['agregar'])){
   
    
    $precioTotal;
  
        $precioTotal=$producto['precio'];
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <style>
        /* Estilo general */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Contenedor del carrito */
        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        /* Estilo de cada producto */
        section div {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 15px;
            padding: 20px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        section div:hover {
            transform: translateY(-5px);
        }

        /* Estilo para las imágenes */
        section div img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Título del producto */
        section h3 {
            font-size: 18px;
            margin: 15px 0;
            color: #333;
        }

        /* Precio */
        section p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Botón de añadir al carrito */
        .submit-btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <section>
        <?php 
      
            if(isset($_POST['agregar'])){
                    if(!isset($_SESSION [$_POST['nombre']]  )){
                        $_SESSION [$_POST['nombre']] = 1;

                    }
                    else{
                        $_SESSION [$_POST['nombre']]++;
                    }
            }
            elseif(isset($_POST['borrar'])){
                if(!isset($_SESSION [$_POST['nombre']]  )){
                    $_SESSION [$_POST['nombre']] = 1;

                }
                else{
                    $_SESSION [$_POST['nombre']]--;
                }
            }
            
    if ( isset( $_SESSION) ){

        foreach ( $_SESSION as $sesion => $cantidad){

            echo ($sesion." a cantidad de ".$cantidad."<br>");

        }

    }



        foreach($ArrayProdcutos as $clave => $producto){ ?>
            <div>
                <form action="" meth></form>
                 
                <?php echo $producto['imagen']; ?>
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Precio: <?php echo $producto['precio']; ?> €</p>
                <h3>Subtotal</h3>
                <p>Precio: <?php echo $precioTotal; ?> €</p>
                <button type="submit" class="submit-btn" name="pagar">Pagar</button>
            
            </div>
        <?php } ?>
    </section>
</body>
</html>
