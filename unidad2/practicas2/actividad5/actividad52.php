<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Consonantes y Letras (Sin Funciones de Cadena)</title>
</head>
<body>
    <h2>Ingrese su Nombre Completo</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" placeholder="Nombre completo">
        <button type="submit">Contar</button>
    </form>

    <?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $vocalesArray = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

    $resultado = [];
    $longitud = strlen($nombre);

    $palabra = "";
    $indicePalabra = 1;
    $numLetras = 0;
    $numVocales = 0;

    for ($i = 0; $i < $longitud; $i++) {
        $letra = $nombre[$i];

        if ($letra === " " || $i === $longitud - 1) {
            if ($letra !== " ") {
                $numLetras++;
                foreach ($vocalesArray as $vocal) {
                    if ($letra === $vocal) {
                        $numVocales++;
                        break;
                    }
                }
            }

            if ($numLetras > 0) {
                $numConsonantes = $numLetras - $numVocales;
                $resultado[] = "Palabra{$indicePalabra}: {$numConsonantes} Consonantes, {$numLetras} Letras";
                $indicePalabra++;
            }

            $palabra = "";
            $numLetras = 0;
            $numVocales = 0;
        } else {
            $palabra .= $letra;
            $numLetras++;

            foreach ($vocalesArray as $vocal) {
                if ($letra === $vocal) {
                    $numVocales++;
                    break;
                }
            }
        }
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