<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calcular Números Primos, Media y Mínimo (Sin Funciones)</title>
</head>
<body>
    <h2>Ingrese una serie de números separados por espacios</h2>
    <form method="POST" action="">
        <input type="text" name="numeros" placeholder="Ejemplo: 3 5 7 10 2">
        <button type="submit">Calcular</button>
    </form>

    <?php
    function calcularValoresSinFunciones($texto, $orden = true) {
        $numeros = [];
        $numeroTemp = "";

        // Convertimos el texto a array de enteros manualmente
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[$i] !== " ") {
                $numeroTemp .= $texto[$i];
            } else if ($numeroTemp !== "") {
                // Convertimos manualmente a entero
                $numeros[] = (int)$numeroTemp;
                $numeroTemp = "";
            }
        }
        if ($numeroTemp !== "") {
            $numeros[] = (int)$numeroTemp;
        }

        // Calculamos la cantidad de números primos
        $nprimos = 0;
        $suma = 0;
        $minimo = $numeros[0];

        foreach ($numeros as $num) {
            $suma += $num;
            if ($num < $minimo) {
                $minimo = $num;
            }
            if ($num > 1 && contarDivisores($num) == 2) {
                $nprimos++;
            }
        }

        // Calculamos media
        $media = $suma / count($numeros);

        // Creamos array asociativo
        $resultado = [
            "nprimos" => $nprimos,
            "media" => $media,
            "mínimo" => $minimo
        ];

        // Ordenamos según el parámetro $orden
        return $orden ? $resultado : invertirArrayManual($resultado);
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

    function invertirArrayManual($array) {
        $invertido = [];
        $keys = array();  // Aquí usaremos un array para las claves

        // Recorremos el array manualmente para obtener las claves
        foreach ($array as $clave => $valor) {
            $keys[] = $clave;  // Guardamos las claves
        }

        $len = count($keys);
        
        // Invertimos el array manualmente usando las claves recolectadas
        for ($i = $len - 1; $i >= 0; $i--) {
            $clave = $keys[$i];  // Obtenemos la clave de la posición invertida
            $invertido[$clave] = $array[$clave];  // Asignamos el valor correspondiente
        }

        return $invertido;
    }

    if (isset($_POST['numeros']) && $_POST['numeros'] !== '') {
        $texto = $_POST['numeros'];
        $resultado = calcularValoresSinFunciones($texto);

        // Mostramos resultados en tabla
        echo "<h3>Resultados</h3><table border='1'><tr><th>Clave</th><th>Valor</th></tr>";
        foreach ($resultado as $clave => $valor) {
            echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>