<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulario de Operaciones Matemáticas</h1>
        <form action="index.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="limite" class="form-label">Límite (1 a 10):</label>
                <input type="range" class="form-range" id="limite" name="limite" min="1" max="10">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="media" name="media">
                <label class="form-check-label" for="media">Media</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="sucesion" name="sucesion">
                <label class="form-check-label" for="sucesion">Sucesión Aritmética</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="factorial" name="factorial">
                <label class="form-check-label" for="factorial">Factorial</label>
            </div>
            <div class="mb-3">
                <label for="datos" class="form-label">Datos (tres líneas con valores separados por comas):</label>
                <textarea class="form-control" id="datos" name="datos" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'lib/funciones.php';

    $limite = intval($_POST['limite']);
    $mediaCheck = isset($_POST['media']);
    $sucesionCheck = isset($_POST['sucesion']);
    $factorialCheck = isset($_POST['factorial']);
    $datos = explode("\n", trim($_POST['datos']));

    $resultado = [];

    // Convertimos cada línea del textarea en un array de datos separados por comas
    $lineas = array_map(fn($linea) => array_map('trim', explode(',', $linea)), $datos);

    // 1. Suma de enteros y floats, y su total
    $resultado['suma_enteros'] = sumaEnteros($lineas);
    $resultado['suma_floats'] = sumaFloats($lineas);
    $resultado['suma_total'] = $resultado['suma_enteros'] + $resultado['suma_floats'];

    // 2. Media de los números
    if ($mediaCheck) {
        $resultado['media'] = calcularMedia($lineas);
    }

    // 3. Sucesión aritmética
    if ($sucesionCheck) {
        $resultado['sucesion'] = generarSucesion($limite);
    }

    // 4. Factorial de la posición o del valor del range
    if ($factorialCheck) {
        $resultado['factorial'] = calcularFactorial($lineas, $limite);
    }

    // 5. Palabra más larga de la última línea
    $resultado['palabra_mas_larga'] = palabraMasLarga($lineas);

    // Mostrar resultados en una tabla
    echo '<div class="container mt-5"><table class="table table-bordered"><thead><tr><th>Clave</th><th>Valor</th></tr></thead><tbody>';
    foreach ($resultado as $clave => $valor) {
        // Si el valor es un array, lo convertimos en una cadena separada por comas
        if (is_array($valor)) {
            $valor = implode(', ', $valor);
        }
        echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
    }
    echo '</tbody></table></div>';
}
?>

</body>
</html>