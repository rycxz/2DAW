<?php
session_start();
if(isset($_POST['añadir'])){
    $_SESSION[$_POST[$clave]];
}
//elegio el mtdo por sesiones ya que me arwece el mas decuando ara este tipo de informacion
$ArrayProdcutos= array(
    "lavadora" => array(
        "nombre" => "Samsung TurboLava 500",
        "precio" => "500",
        //la imagenes las pongo asi para pder meterlas de un lado a otro sin repetir codigo
        "imagen" =>  "<img src='imagenes/lavadora.jpeg'/ />"
    ),
    "frigorifico" => array(
        "nombre" => "Yamel is Cold BRRRR",
        "precio" => "700",
          "imagen" =>  "<img src='imagenes/frigo.jpeg'/ />"
    ),
    "piano" => array(
        "nombre" => "Yamaha betoveen",
        "precio" => "1200",
          "imagen" =>  "<img src='imagenes/piano.jpeg'/ />"
    ),
    "asiprador" => array(
        "nombre" => "Shein aspiratodo",
        "precio" => "4",
          "imagen" =>  "<img src='imagenes/a.jpeg'/ />"
    ),
    "lampara" => array(
        "nombre" => "Deslumbra ideas",
        "precio" => "70",
          "imagen" =>  "<img src='imagenes/lamp.jpeg'/ />"
    ),
    "altavoces" => array(
        "nombre" => "Los molestavecions ",
        "precio" => "300",
          "imagen" =>  "<img src='imagenes/altavoces.jpg'/ />"
    ),
    "maquina" => array(
        "nombre" => "Maquina hidrulica x900",
        "precio" => "8999" ,
          "imagen" =>  "<img src='imagenes/maquina.jpg'/ />"
    )
); 



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        main {
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
            width:100% ;
        }

        .product-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .product {
            background-color: white;
            padding: 15px;
            border: 1px solid #ddd;
            width: 250px;
            margin: 10px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>


    <header>
        <h1>Tienda en Línea</h1>
        <nav>
            <a href="cart.php">Ver Carrito</a>
        </nav>
    </header>

    <main>
        <br>
        <!-- Formulario de carrito de compras -->
        <form action="ejercicio04.php" method="post">
            <section class="product-list">
                <h2>Productos Disponibles</h2>
                <br>
                <br>
                <div class="product"> 
                <?php 
                //facemos un for con el array
             
                foreach($ArrayProdcutos as $clave => $producto){ ?>
                 
                      <?php echo  $producto['imagen']  ?>  
                    <h3> <?php echo  $producto['nombre']  ?> </h3>
                    <p>Precio:  <?php echo  $producto['precio']  ?> </p>
                    <input type="hidden" value=" <?php echo $clave ?>">
                    <input type="hidden" value="añadir">
                    <button type="submit" class="submit-btn">Procesar Pago</button>
                    
           
                </div>
          
            </section>
             <?php }?>
             <?php
             foreach($_SESSION as $producto => $cantidad){
                echo "<li> $producto: $cantidad  </li>";
             }
             
             
             ?>
        </form>
    </main>

   
</body>
</html>
 