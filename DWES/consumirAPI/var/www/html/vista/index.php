<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento de Aeropuertos y Aviones</title>
    <link rel="shortcut icon" href="../imagenLogo/logoIcono.ico" type="image/x-icon">

</head>
<body>
    <header>
        <img src="../imagenLogo/logoNoFondo.png" alt="Icono" />
        <h1>Seguimiento de Aeropuertos y Aviones</h1>
    </header>

    <div class="container">
        <h2>Seleccionar Aeropuerto</h2>
        <form id="airportForm" method="post" action="../controlador/controladorTimeTable.php">
            <label for="airport">Elige un aeropuerto:</label>
            <select id="airport" name="airport">
                <option value="<?php ?>" id="airport"><?php ?></option>

            </select>
            <button type="submit" id="timetable">Confirmar Aeropuerto</button>
        </form>
    </div>

    <div class="container">
        <h2>Seguimiento de Aviones</h2>
        <form id="airplaneForm" method="post" action="../controlador/controladorSeguimientoVuelo.php">
            <label for="airplane">Elige un avión en vuelo:</label>
            <select id="airplane" name="airplane">
                <option value="<?php ?>" id="seguirAvion"><?php ?></option>

            </select>
            <button type="submit" id="mapaDeUnAvion">Rastrear Avión</button>
        </form>
    </div>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: transparent;
            color: #333;
            background-image: url(../imagenLogo/bgIndex.png);
        }

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        header img {
            height: 50px;
            margin-right: 15px;
        }

        header h1 {
            color: #333;
            font-size: 24px;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        select {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</html>
