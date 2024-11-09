<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Números Primos, Media y Mínimo</title>
</head>
<body>
    <h2>Ingrese una serie de números separados por espacios</h2>
    <form method="POST" action="">
        <input type="text" name="numeros" placeholder="Ejemplo: 3 5 7 10 2">
        <button type="submit">Calcular</button>
    </form>

    <?php
    function calcularValores($texto, $orden = true) {
        // Convertimos el texto en un array de números
        $numeros = explode(" ", $texto);
        $numerosLimpiados = [];

        // Filtramos los valores vacíos y convertir los números a enteros
        foreach ($numeros as $num) {
            $num = trim($num);
            if ($num !== '') {
                // Convertimos el número manualmente
                $numerosLimpiados[] = (int)$num;
            }
        }

        // Calculamos la cantidad de números primos
        $nprimos = 0;
        foreach ($numerosLimpiados as $num) {
            if ($num > 1 && contarDivisores($num) == 2) {
                $nprimos++;
            }
        }

        // Calculamos la suma manualmente
        $suma = 0;
        foreach ($numerosLimpiados as $numero) {
            $suma += $numero;
        }

        // Calculamos la media
        $media = $suma / count($numerosLimpiados);

        // Encontramos el mínimo
        $minimo = min($numerosLimpiados);

        // Creamos array asociativo
        $resultado = [
            "nprimos" => $nprimos,
            "media" => $media,
            "mínimo" => $minimo
        ];

        // Ordenamos según el parámetro $orden
        return $orden ? $resultado : invertirArray($resultado);
    }

    function contarDivisores($numero) {
        $divisores = 0;
        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) {
                $divisores++;
            }
        }
        return $divisores;
    }

    function invertirArray($array) {
        $invertido = [];
        $cantidad = count($array);
        
        // Invertimos el array manualmente usando índices numéricos
        for ($i = $cantidad - 1; $i >= 0; $i--) {
            $invertido[] = $array[$i];
        }
        
        return $invertido;
    }    

    if (isset($_POST['numeros'])) {
        $texto = $_POST['numeros'];
        $resultado = calcularValores($texto);

        // Mostrar resultados en tabla
        echo "<h3>Resultados</h3><table border='1'><tr><th>Clave</th><th>Valor</th></tr>";
        foreach ($resultado as $clave => $valor) {
            echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>