<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de números</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los números enviados por el formulario
    $numero1 = str_replace(',', '.', $_POST['numero1']); // Reemplazar coma por punto
    $numero2 = str_replace(',', '.', $_POST['numero2']); // Reemplazar coma por punto

    // Convertir los números a float para asegurar que sean válidos para las operaciones
    $numero1 = floatval($numero1);
    $numero2 = floatval($numero2);

    // Convertir el primer número a entero con truncamiento
    $numero1_truncado = (int)$numero1;

    // Redondear el segundo número
    $numero2_redondeado = round($numero2);

    // Mostrar los resultados
    echo "Número 1 original: {$_POST['numero1']}<br>";
    echo "Número 1 truncado: $numero1_truncado<br>";
    echo "Número 2 original: {$_POST['numero2']}<br>";
    echo "Número 2 redondeado: $numero2_redondeado<br><br>";
}
?>

<form action="" method="post">
    <label for="numero1">Número 1 (truncar):</label>
    <input type="text" id="numero1" name="numero1" required>
    <br><br>
    <label for="numero2">Número 2 (redondear):</label>
    <input type="text" id="numero2" name="numero2" required>
    <br><br>
    <input type="submit" value="Enviar">
</form>

</body>
</html>
