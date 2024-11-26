<?php
$yield = isset($_GET['yield']) ? $_GET['yield'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <h1>Resultados del Simulador</h1>
        <p>El rendimiento estimado es: <strong><?php echo round($yield, 2); ?> kg/ha</strong></p>
        <a href="../index.php">Regresar</a>
    </div>
</body>
</html>
