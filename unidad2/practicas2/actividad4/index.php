<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Operaciones Matemáticas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Formulario de Operaciones Matemáticas</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="limite">Límite (1-10):</label>
            <input type="range" id="limite" name="limite" min="1" max="10">
        </div>
        <div class="form-group">
            <label>Opciones:</label><br>
            <input type="checkbox" name="opciones[]" value="media"> Media
            <input type="checkbox" name="opciones[]" value="sucesion"> Sucesión Aritmética
            <input type="checkbox" name="opciones[]" value="factorial"> Factorial
        </div>
        <div class="form-group">
            <label for="textarea">Ingrese los datos separados por comas:</label>
            <textarea id="textarea" name="textarea" rows="3" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <?php
if ($_POST) {
    require_once 'lib/funciones.php';

    // Leemos los datos
    $limite = (int)$_POST['limite'];
    $opciones = $_POST['opciones'] ?? [];
    $textarea = explode("\n", trim($_POST['textarea']));

    // Procesamos los datos del textarea
    $enteros = array_map('intval', explode(',', $textarea[0] ?? ''));
    $floats = array_map('floatval', explode(',', $textarea[1] ?? ''));
    $strings = explode(',', $textarea[2] ?? '');

    // Array con los resultados
    $resultados = [];

    // Hacemos la suma de enteros, floats y la suma total
    $resultados['Suma Enteros'] = sumaEnteros($enteros);
    $resultados['Suma Floats'] = sumaFloats($floats);
    $resultados['Suma Total'] = sumaTotal($enteros, $floats);

    // Opciones a elegir
    if (in_array('media', $opciones)) {
        $resultados['Media'] = calcularMedia([...$enteros, ...$floats]);
    }
    if (in_array('sucesion', $opciones)) {
        $resultados['Sucesión Aritmética'] = sucesionAritmetica($limite);
    }
    if (in_array('factorial', $opciones)) {
        $resultados['Factorial'] = calcularFactorial($enteros, $limite);
    }

    // Buscamos la palabra más larga
    $resultados['Palabra más Larga'] = palabraMasLarga($strings);

    // Mostramos los resultados en la tabla
    echo "<table class='table table-bordered mt-4'><thead><tr><th>Clave</th><th>Valor</th></tr></thead><tbody>";
    foreach ($resultados as $clave => $valor) {
        echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
    }
    echo "</tbody></table>";
}
?>

</div>
</body>
</html>