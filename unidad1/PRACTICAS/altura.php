<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altura de Personas</title>
</head>
<body>
    <h1>Formulario para ingresar alturas de 5 personas</h1>
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <label for="nombre<?php echo $i; ?>">Nombre de la persona <?php echo $i; ?>:</label>
            <input type="text" name="nombre<?php echo $i; ?>" required><br><br>

            <label for="altura<?php echo $i; ?>">Altura de la persona <?php echo $i; ?> (en metros, con 3 decimales):</label>
            <input type="float" name="altura<?php echo $i; ?>" pattern="\d+(\.\d{1,3})?" required><br><br>
        <?php endfor; ?>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Inicializamos las variables
        $personas = [];
        $alturas = [];
        $totalAltura = 0;

        // Recorremos 5 veces para leer las entradas del formulario
        for ($i = 1; $i <= 5; $i++) {
            $nombre = $_POST["nombre$i"]; // Leer nombre
            $altura = (float) $_POST["altura$i"]; // Leer altura y convertir a float

            $personas[$nombre] = $altura; // Guardar nombre y altura
            $alturas[] = $altura; // Guardar solo la altura para cálculos
            $totalAltura += $altura; // Sumar altura para el cálculo de media
        }

        // Calcular la altura media
        $alturaMedia = round($totalAltura / 5, 1);

        // Encontrar la persona más alta
        $nombreMasAlto = array_keys($personas, max($alturas))[0];
        $alturaMasAlta = floor($personas[$nombreMasAlto]); // Convertir la altura a entero

        // Mostrar resultados
        echo "<h2>Resultados</h2>";
        echo "La altura media es: $alturaMedia metros<br>";
        echo "La persona más alta es $nombreMasAlto con una altura de $alturaMasAlta metros<br>";
    }
    ?>
</body>
</html>
