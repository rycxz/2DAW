<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Personaje</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #personaje {
            display: flex;
            gap: 20px;
        }
        #personaje img {
            max-width: 200px;
            border-radius: 10px;
        }
        #info {
            max-width: 600px;
        }
        #info h2 {
            margin: 0;
        }
        .enlace-planeta {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .enlace-planeta:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <form id="formInicio" action="../controlador/controladorIndex.php" method="get">
        <h1 id="tituloForm">Volver al Inicio</h1>
        <button id="btnInicio" type="submit">Ir al Inicio</button>
    </form>

    <div id="personaje">
        <img src="<? echo $personaje['image']; ?> " alt="Imagen de Janemba">
        <div id="info">
            <h2>Nombre: Janemba</h2>
            <p><strong>Raza:</strong> <? echo $personaje['race']; ?>  </p>
            <p><strong>Género:</strong> <? echo $personaje['gender']; ?></p>
            <p><strong>Ki Actual:</strong> <? echo $personaje['ki']; ?></p>
            <p><strong>Ki Máximo:</strong> <? echo $personaje['maxKi']; ?></p>
            <p><strong>Descripción:</strong> <? echo $personaje['description']; ?></p>
            <a class="enlace-planeta" href="../controlador/mostrarPlaneta.php?planeta1=<? echo $personaje['originPlanet']['id']; ?>">Ver información del planeta: <? echo $personaje['originPlanet']['name']; ?></a>
        </div>
    </div>

</body>
</html>
