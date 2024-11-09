<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Consonantes y Letras</title>
</head>
<body>
    <h2>Ingrese su Nombre Completo</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre completo">
        <button type="submit">Contar</button>
    </form>

    <?php
if ($_POST) {
    $nombre = trim($_POST['nombre']);
    $palabras = explode(" ", $nombre);

    $vocalesArray = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

    $resultado = [];
    foreach ($palabras as $indice => $palabra) {
        $palabra = trim($palabra);
        if ($palabra === '') continue;

        $numLetras = strlen($palabra);
        $numVocales = 0;

        // Contamos vocales
        for ($i = 0; $i < $numLetras; $i++) {
            foreach ($vocalesArray as $vocal) {
                if ($palabra[$i] === $vocal) {
                    $numVocales++;
                    break;
                }
            }
        }

        $numConsonantes = $numLetras - $numVocales;
        $resultado[] = "Palabra" . ($indice + 1) . ": {$numConsonantes} Consonantes, {$numLetras} Letras";
    }

    echo "<h3>Resultado:</h3><ul>";
    foreach ($resultado as $res) {
        echo "<li>{$res}</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>