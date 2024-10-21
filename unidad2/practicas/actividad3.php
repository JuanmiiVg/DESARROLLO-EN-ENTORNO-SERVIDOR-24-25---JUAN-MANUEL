<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            margin-top: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: inline-block;
            padding: 20px;
            width: 350px;
        }
        h2 {
            color: #333;
        }
        .cartas {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .cartas img {
            width: 100px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .resultado {
            font-weight: bold;
            font-size: 20px;
            margin-top: 15px;
        }
        .pareja {
            color: green;
        }
        .no-pareja {
            color: red;
        }
        .valor-alto {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    /* 
    Escriba un programa que cada vez que se ejecute saque dos cartas de baraja de poker al azar 
    y diga si ha salido una pareja de valores iguales y el mayor de los valores obtenidos. 
    Mostrar las cartas con imágenes.
    */

    // Definimos la baraja de cartas
    $palos = ['hearts', 'diamonds', 'clubs', 'spades'];
    $valores = [
        '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7,
        '8' => 8, '9' => 9, '10' => 10, 'jack' => 11, 'queen' => 12,
        'king' => 13, 'ace' => 14
    ];

    // Función para sacar una carta aleatoria
    function sacarCartaAleatoria($palos, $valores) {
        $palo = $palos[array_rand($palos)];
        $nombreValor = array_rand($valores);
        $valor = $valores[$nombreValor];
        return [
            'palo' => $palo,
            'nombreValor' => $nombreValor,
            'valor' => $valor
        ];
    }

    // Sacamos dos cartas al azar
    $carta1 = sacarCartaAleatoria($palos, $valores);
    $carta2 = sacarCartaAleatoria($palos, $valores);

    // Determinamos si es una pareja
    $esPareja = $carta1['valor'] === $carta2['valor'];

    // Determinamos la carta con el mayor valor
    $cartaMayor = $carta1['valor'] >= $carta2['valor'] ? $carta1 : $carta2;

    // Mostramos los resultados
    echo "<h2>Cartas obtenidas:</h2>";
    echo "<div class='cartas'>";
    echo "<img src='img/{$carta1['nombreValor']}_of_{$carta1['palo']}.png' alt='Carta 1'>";
    echo "<img src='img/{$carta2['nombreValor']}_of_{$carta2['palo']}.png' alt='Carta 2'>";
    echo "</div>";

    echo "<div class='resultado'>";
    if ($esPareja) {
        echo "<p class='pareja'>¡Es una pareja de {$carta1['nombreValor']}s!</p>";
    } else {
        echo "<p class='no-pareja'>No es una pareja.</p>";
    }
    echo "</div>";

    echo "<p class='valor-alto'>El valor más alto es: {$cartaMayor['nombreValor']} de {$cartaMayor['palo']}.</p>";
    ?>
</div>

</body>
</html>