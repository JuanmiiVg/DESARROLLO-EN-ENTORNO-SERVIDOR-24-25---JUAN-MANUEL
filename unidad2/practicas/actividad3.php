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
    // Definimos la baraja de cartas
    $palos = ['hearts', 'diamonds', 'clubs', 'spades'];
    $valores = [
        '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7,
        '8' => 8, '9' => 9, '10' => 10, 'jack' => 11, 'queen' => 12,
        'king' => 13, 'ace' => 14
    ];

    // Sacamos la primera carta al azar
    $indicePalo1 = array_rand($palos);
    $nombreValor1 = array_rand($valores);
    $valor1 = $valores[$nombreValor1];
    $palo1 = $palos[$indicePalo1];

    // Sacamos la segunda carta al azar
    $indicePalo2 = array_rand($palos);
    $nombreValor2 = array_rand($valores);
    $valor2 = $valores[$nombreValor2];
    $palo2 = $palos[$indicePalo2];

    // Determinamos si son una pareja
    $esPareja = ($valor1 === $valor2);

    // Determinamos la carta con el mayor valor
    if ($valor1 >= $valor2) {
        $nombreValorMayor = $nombreValor1;
        $paloMayor = $palo1;
    } else {
        $nombreValorMayor = $nombreValor2;
        $paloMayor = $palo2;
    }

    // Mostramos los resultados
    echo "<h2>Cartas obtenidas:</h2>";
    echo "<div class='cartas'>";
    echo "<img src='img/{$nombreValor1}_of_{$palo1}.png' alt='Carta 1'>";
    echo "<img src='img/{$nombreValor2}_of_{$palo2}.png' alt='Carta 2'>";
    echo "</div>";

    echo "<div class='resultado'>";
    if ($esPareja) {
        echo "<p class='pareja'>¡Es una pareja de {$nombreValor1}s!</p>";
    } else {
        echo "<p class='no-pareja'>No es una pareja.</p>";
    }
    echo "</div>";

    echo "<p class='valor-alto'>El valor más alto es: {$nombreValorMayor} de {$paloMayor}.</p>";
    ?>
</div>
</body>
</html>