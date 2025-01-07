<?php
if ($personaje1['ki'] > $personaje2['ki']) {
    $ganador = $personaje1;
    $perdedor = $personaje2;
    $mensaje = $personaje1['name'] . " es el ganador!";
} elseif ($personaje1['ki'] < $personaje2['ki']) {
    $ganador = $personaje2;
    $perdedor = $personaje1;
    $mensaje = $personaje2['name'] . " es el ganador!";
} else {
    $ganador = null;
    $mensaje = "¡Es un empate!";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Combate</title>
</head>
<body>
    <h1>Resultado del Combate</h1>
    <p><?php echo $mensaje; ?></p>
   <?php if($ganador==null){
            ?>
            <div class="titulo">El reusltado ha sido un empate!</div>
                <div class="per1">
                    <img src="<? echo $personaje1['image']; ?>">
                    <h2> <? echo $personaje1['name'];?></h2>
                    <h3> <? echo $personaje1['ki'];?></h3>
                </div>
                <div class="per2">
                    <img src="<? echo $personaje2['image'] ?>">
                    <h2> <? echo $personaje2['name'];?> </h2>
                    <h3> <? echo $personaje2['ki'];?> </h3>
                </div>

            <?} else{?>
                    <div class="ganador">
                    <img src="<? echo $ganador['image']; ?>">
                    <h2> <? echo $ganador['name'];?></h2>
                    <h3> <? echo $ganador['ki'];?></h3>
                    </div>

                    <div class="perdedor">
                    <img src="<? echo $perdedor['image']; ?>">
                    <h2> <? echo $perdedor['name'];?></h2>
                    <h3> <? echo $perdedor['ki'];?></h3>
                    </div>
            <?}
            ?>
              <form id="formInicio" action="../controlador/controladorIndex.php" method="get">
        <h1 id="tituloForm">Volver al Inicio</h1>
        <button id="btnInicio" type="submit">Ir al Inicio</button>
    </form>

</body>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
    text-align: center;
}
button#btnInicio {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button#btnInicio:hover {
            background-color: #45a049;
        }

h1 {
    color: #4CAF50;
    margin-bottom: 20px;
}

p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.titulo {
    font-size: 1.5rem;
    color: #ff5722;
    margin-bottom: 20px;
}

.per1, .per2, .ganador, .perdedor {
    display: inline-block;
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    margin: 10px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    width: 250px;
}

.per1 img, .per2 img, .ganador img, .perdedor img {
    width: 100px;
    height: 200px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.per1 h2, .per2 h2, .ganador h2, .perdedor h2 {
    font-size: 1.2rem;
    margin: 5px 0;
    color: #555;
}

.per1 h3, .per2 h3, .ganador h3, .perdedor h3 {
    font-size: 1rem;
    margin: 5px 0;
    color: #777;
}

.ganador {
    border: 3px solid gold;
    background-color: #fffbea;
    box-shadow: 0 0 10px 2px gold;
}

.perdedor {
    opacity: 0.8;
    background-color: #f8f8f8;
}

.per1, .per2 {
    background-color: #e8f5ff;
    border-color: #90caf9;
}

</style>
</html>
