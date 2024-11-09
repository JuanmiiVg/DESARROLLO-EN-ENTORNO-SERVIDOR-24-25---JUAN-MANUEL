<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valor de las Palabras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Calcula el Valor de Dos Palabras</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="palabra1" class="form-label">Escribe la primera palabra:</label>
                <input type="text" class="form-control" id="palabra1" name="palabra1" required>
            </div>
            <div class="mb-3">
                <label for="palabra2" class="form-label">Escribe la segunda palabra:</label>
                <input type="text" class="form-control" id="palabra2" name="palabra2" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        include 'lib/funciones.php';

        // Comprobamos si el formulario ha sido enviado
        if (isset($_POST['palabra1']) && isset($_POST['palabra2'])) {
            // Obtener las dos palabras ingresadas por el usuario
            $palabra1 = strtolower($_POST['palabra1']);
            $palabra2 = strtolower($_POST['palabra2']);

            // Usar las tres versiones de la función para las dos palabras

            // Versión 1: Usando funciones PHP (ord)
            $valorPalabra1 = obtenerValorPalabra($palabra1);
            $valorPalabra2 = obtenerValorPalabra($palabra2);

            // Versión 2: Usando array asociativo
            $valorPalabra1Array = obtenerValorPalabraArray($palabra1);
            $valorPalabra2Array = obtenerValorPalabraArray($palabra2);

            // Versión 3: Comparando las dos palabras
            $comparacion = compararPalabras($palabra1, $palabra2);

            // Mostramos resultados
            echo "<div class='mt-3'><strong>Versión 1 (usando ord):</strong> El valor de la palabra '$palabra1' es: $valorPalabra1 y el valor de '$palabra2' es: $valorPalabra2</div>";
            echo "<div class='mt-3'><strong>Versión 2 (usando array asociativo):</strong> El valor de la palabra '$palabra1' es: $valorPalabra1Array y el valor de '$palabra2' es: $valorPalabra2Array</div>";
            echo "<div class='mt-3'><strong>Versión 3 (comparación entre '$palabra1' y '$palabra2'):</strong> $comparacion</div>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>