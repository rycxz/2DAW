<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Vuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .estado-en-tiempo {
            color: green;
            font-weight: bold;
        }

        .estado-retrasado {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Tabla de Llegadas del Aeropuerto</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Número de Vuelo</th>
                <th>Aerolínea</th>
                <th>Origen</th>
                <th>Puerta</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($vuelosLlegadas)): ?>
                <?php foreach ($vuelosLlegadas as $index => $vuelo): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($vuelo['flight_date']) ?></td>
                        <td>
                            <?= isset($vuelo['arrival']['scheduled'])
                                ? date('H:i', strtotime($vuelo['arrival']['scheduled']))
                                : 'N/A' ?>
                        </td>
                        <td><?= htmlspecialchars($vuelo['flight']['iata']) ?></td>
                        <td><?= htmlspecialchars($vuelo['airline']['name']) ?></td>
                        <td><?= htmlspecialchars($vuelo['departure']['airport']) ?></td>
                        <td><?= htmlspecialchars($vuelo['arrival']['gate'] ?? 'N/A') ?></td>
                        <td class="<?= isset($vuelo['arrival']['delay']) && $vuelo['arrival']['delay'] > 0
                            ? 'estado-retrasado'
                            : 'estado-en-tiempo' ?>">
                            <?= isset($vuelo['arrival']['delay']) && $vuelo['arrival']['delay'] > 0
                                ? 'Retrasado'
                                : 'En Tiempo' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay vuelos de llegada para este aeropuerto.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h1>Tabla de Salidas del Aeropuerto</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Número de Vuelo</th>
                <th>Aerolínea</th>
                <th>Destino</th>
                <th>Puerta</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($vuelosSalidas)): ?>
                <?php foreach ($vuelosSalidas as $index => $vuelo): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($vuelo['flight_date']) ?></td>
                        <td>
                            <?= isset($vuelo['departure']['scheduled'])
                                ? date('H:i', strtotime($vuelo['departure']['scheduled']))
                                : 'N/A' ?>
                        </td>
                        <td><?= $vuelo['flight']['iata']; ?></td>
                        <td><?= htmlspecialchars($vuelo['airline']['name']) ?></td>
                        <td><?= htmlspecialchars($vuelo['arrival']['airport']) ?></td>
                        <td><?= htmlspecialchars($vuelo['departure']['gate'] ?? 'N/A') ?></td>
                        <td class="<?= isset($vuelo['departure']['delay']) && $vuelo['departure']['delay'] > 0
                            ? 'estado-retrasado'
                            : 'estado-en-tiempo' ?>">
                            <?= isset($vuelo['departure']['delay']) && $vuelo['departure']['delay'] > 0
                                ? 'Retrasado'
                                : 'En Tiempo' ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No hay vuelos de salida para este aeropuerto.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
