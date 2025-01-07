
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Planeta</title>
</head>
<body>
    <div class="planeta-container">

       <center>  <h1><?php echo htmlspecialchars($planeta['name']); ?></h1> <img src="<? echo $planeta['image'];?>" ></center>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($planeta['description']); ?></p>
        <p><strong>¿Destruido?:</strong> <?php echo $planeta['isDestroyed'] ? 'Sí' : 'No'; ?></p>
    </div>

    <div class="personajes-list">
        <h2>Personajes asociados:</h2>
        <ul>
            <?php if (!empty($planeta['characters'])): ?>
                <?php foreach ($planeta['characters'] as $personaje): ?>
                    <li>
                        <a href="../controlador/mostrarPersonaje.php?idPersonaje=<? echo $personaje['id']; ?>">
                            <?php echo htmlspecialchars($personaje['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No hay personajes asociados a este planeta.</li>
            <?php endif; ?>
        </ul>
    </div>
    <form id="formInicio" action="../controlador/controladorIndex.php" method="get">
        <h1 id="tituloForm">Volver al Inicio</h1>
        <button id="btnInicio" type="submit">Ir al Inicio</button>
    </form>
</body>
<style>

/* General */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f9;
    color: #333;
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

/* Contenedor del planeta */
.planeta-container {
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.planeta-container h1 {
    font-size: 24px;
    color: #007BFF;
    margin-bottom: 10px;
}

.planeta-container img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.planeta-container p {
    font-size: 16px;
    margin: 8px 0;
}

/* Contenedor de personajes */
.personajes-list {
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.personajes-list h2 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #007BFF;
}

.personajes-list ul {
    list-style: none;
    padding: 0;
}

.personajes-list li {
    margin-bottom: 10px;
    font-size: 16px;
}

.personajes-list a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
    transition: color 0.3s ease;
}

.personajes-list a:hover {
    color: #0056b3;
    text-decoration: underline;
}

/* Responsivo */
@media (max-width: 768px) {
    body {
        padding: 10px;
    }

    .planeta-container,
    .personajes-list {
        padding: 15px;
    }

    .planeta-container h1,
    .personajes-list h2 {
        font-size: 22px;
    }

    .planeta-container p,
    .personajes-list li {
        font-size: 14px;
    }
}

</style>
</html>
