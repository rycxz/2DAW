<<<<<<< HEAD
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
        $ArrayProdcutos = array(
            "pizza" => array(
                "nombre" => "Margarita",
                "precio" => "13",
                "imagen" => "<img src='imagenes/pizza.jfif' />"
            ),
            "hamburger" => array(
                "nombre" => "Caprichosa",
                "precio" => "15",
                "imagen" => "<img src='imagenes/ham.jfif' />"
            ),
            "arroz" => array(
                "nombre" => "Arroz 3 Delicias",
                "precio" => "4",
                "imagen" => "<img src='imagenes/arroz.jfif' />"
            ),
            "huevo" => array(
                "nombre" => "Huevo Revuelto",
                "precio" => "2",
                "imagen" => "<img src='imagenes/huevo.jfif' />"
            ),
            "cuches" => array(
                "nombre" => "Chuches",
                "precio" => "1.4",
                "imagen" => "<img src='imagenes/chu.jfif' />"
            ),
        );
        
        foreach($ArrayProdcutos as $clave => $producto){ ?>
            <div>
                <form action="listaProductos.php" method="post">
                <?php echo $producto['imagen']; ?>
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Precio: <?php echo $producto['precio']; ?> €</p>
                <button type="submit" class="submit-btn" name="agregar" value="<?php $producto["nombre"];?>">Añadir</button>
                <button type="submit" class="submit-btn" name="borrar" value="<?php $producto['nombre'];?>">Borrar</button>
            </form>
            </div>
        <?php } ?>
    </section>
</body>
</html>
=======
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
        $ArrayProdcutos = array(
            "pizza" => array(
                "nombre" => "Margarita",
                "precio" => "13",
                "imagen" => "<img src='imagenes/pizza.jfif' />"
            ),
            "hamburger" => array(
                "nombre" => "Caprichosa",
                "precio" => "15",
                "imagen" => "<img src='imagenes/ham.jfif' />"
            ),
            "arroz" => array(
                "nombre" => "Arroz 3 Delicias",
                "precio" => "4",
                "imagen" => "<img src='imagenes/arroz.jfif' />"
            ),
            "huevo" => array(
                "nombre" => "Huevo Revuelto",
                "precio" => "2",
                "imagen" => "<img src='imagenes/huevo.jfif' />"
            ),
            "cuches" => array(
                "nombre" => "Chuches",
                "precio" => "1.4",
                "imagen" => "<img src='imagenes/chu.jfif' />"
            ),
        );
        
        foreach($ArrayProdcutos as $clave => $producto){ ?>
            <div>
                <form action="listaProductos.php" method="post">
                <?php echo $producto['imagen']; ?>
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Precio: <?php echo $producto['precio']; ?> €</p>
                <button type="submit" class="submit-btn" name="agregar" value="<?php $producto["nombre"];?>">Añadir</button>
                <button type="submit" class="submit-btn" name="borrar" value="<?php $producto['nombre'];?>">Borrar</button>
            </form>
            </div>
        <?php } ?>
    </section>
</body>
</html>
>>>>>>> origin/master
