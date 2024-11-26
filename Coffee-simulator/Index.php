<?php
require_once 'lib/CoffeeCalculator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parameters = [
        'temperature' => $_POST['temperature'],
        'rainfall' => $_POST['rainfall'],
        'organicMatter' => $_POST['organicMatter'],
        'plantDensity' => $_POST['plantDensity'],
        'waterUsage' => $_POST['waterUsage'],
    ];

    $calculator = new CoffeeCalculator($parameters);
    $yield = $calculator->calculateYield();

    header("Location: views/results.php?yield=" . $yield);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Style.css">
    <title>Simulador de Producción Cafetera</title>
</head>
<body>
    <div class="container">
        <h1>Simulador de Producción Cafetera</h1>
        <form action="index.php" method="POST">
            <label>Temperatura (°C):</label>
            <input type="number" name="temperature" step="0.1" required>

            <label>Precipitación (mm):</label>
            <input type="number" name="rainfall" step="1" required>

            <label>Materia Orgánica (%):</label>
            <input type="number" name="organicMatter" step="0.1" required>

            <label>Densidad de Siembra (plantas/ha):</label>
            <input type="number" name="plantDensity" required>

            <label>Uso de Agua (L/kg):</label>
            <input type="number" name="waterUsage" step="0.1" required>

            <button type="submit">Calcular</button>
        </form>
    </div>
</body>
</html>
