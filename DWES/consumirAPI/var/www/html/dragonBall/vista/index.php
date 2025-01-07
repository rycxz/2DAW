<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DragonBall</title>
</head>
<body>
    <header>
        <h1>DragonBall</h1>
    </header>
    <main>

    <section id="combate">
    <h2>Combate</h2>
    <form action="../controlador/batallaPersonajes.php" method="post">
        <div class="form-container">
            <div>
                <label for="personaje1">Personaje 1:</label>
                <select id="personaje1" name="personaje1" required>
                    <option value="noValido">Selecciona un personaje</option>
                    <?php
                        if (isset($personajes['items']) && is_array($personajes['items'])) {
                            foreach ($personajes['items'] as $personaje) {
                                if (!empty($personaje['id']) && !empty($personaje['name'])) {
                                    echo "<option name='personaje1' value='" . htmlspecialchars($personaje['id']) . "'>" . htmlspecialchars($personaje['name']) . "</option>";
                                }
                            }
                        }
                    ?>
                </select>
            </div>
            <div>
                <label for="personaje2">Personaje 2:</label>
                <select id="personaje2" name="personaje2" required>
                    <option value="noValido">Selecciona un personaje</option>
                    <?php
                        if (isset($personajes['items']) && is_array($personajes['items'])) {
                            foreach ($personajes['items'] as $personaje) {
                                if (!empty($personaje['id']) && !empty($personaje['name'])) {
                                    echo "<option name='personaje2' value='" . htmlspecialchars($personaje['id']) . "'>" . htmlspecialchars($personaje['name']) . "</option>";
                                }
                            }
                        }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit">Comparar</button>
    </form>
</section>

        <!-- Perfil Personaje Section -->
        <form action="../controlador/mostrarPersonaje.php" method="post">
    <section id="perfil-personaje">
        <div>
            <label for="personajeVer">Perfil del Personaje:</label>
            <select id="personajeVer" name="personajeVer" required>
                <option value="noValido">Selecciona un personaje</option>
                <?php
                if (isset($personajes['items']) && is_array($personajes['items'])) {
                    foreach ($personajes['items'] as $personaje) {
                        if (!empty($personaje['id']) && !empty($personaje['name'])) {
                            echo "<option name='personajeVer' value='" . htmlspecialchars($personaje['id']) . "'>" . htmlspecialchars($personaje['name']) . "</option>";
                        }
                    }
                }
                ?>
            </select>
        </div>
        <div>
            <button type="submit">Ver Perfil</button>
        </div>
    </section>
</form>



        <!-- Perfil Planeta Section -->
        <form action="../controlador/mostrarPlaneta.php" method="post">
    <div class="form-container">
        <!-- Selección del primer planeta -->
        <div>
            <label for="planeta1">Planetas para investigar:</label>
            <select id="planeta1" name="planeta1" required>
                <option value="noValido">Selecciona un planeta</option>
                <?php
                if (isset($planetas['items']) && is_array($planetas['items'])) {
                    foreach ($planetas['items'] as $planeta) {
                        if (!empty($planeta['id']) && !empty($planeta['name'])) {
                            echo "<option name='planetaVer' value='" . htmlspecialchars($planeta['id']) . "'>" . htmlspecialchars($planeta['name']) . "</option>";
                        }
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <button type="submit">Enviar</button>
</form>



    </main>


</body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        section {
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 80%;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-container select {
            padding: 10px;
            font-size: 16px;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
        .profile {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .profile img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .profile-info {
            flex: 1;
        }
        .profile-info a {
            color: #007BFF;
            text-decoration: none;
        }
        .profile-info a:hover {
            text-decoration: underline;
        }
    </style>
</html>
