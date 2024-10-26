<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Poker</title>
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
        <h2>Juego de Poker</h2>
        <div class="cartas">
            <?php
            // Arrays con los valores y palos de las cartas
            $valores = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "jack", "queen", "king", "ace"];
            $palos = ["hearts", "diamonds", "clubs", "spades"];

            // Generamos las dos cartas al azar
            $valor1 = $valores[rand(0, count($valores) - 1)];
            $palo1 = $palos[rand(0, count($palos) - 1)];
            $valor2 = $valores[rand(0, count($valores) - 1)];
            $palo2 = $palos[rand(0, count($palos) - 1)];

            // Mostramos las cartas
            echo "<img src='img/{$valor1}_of_{$palo1}.png' alt='Carta 1'>";
            echo "<img src='img/{$valor2}_of_{$palo2}.png' alt='Carta 2'>";
            ?>
        </div>
        <div class="resultado">
            <?php
            // Verificamos si son una pareja
            if ($valor1 == $valor2) {
                echo "<p class='pareja'>¡Es una pareja de {$valor1}s!</p>";
            } else {
                // Determinamos cuál es el mayor
                $indice1 = 0;
                $indice2 = 0;

                // Encontrar los índices correspondientes de los valores
                for ($i = 0; $i < count($valores); $i++) {
                    if ($valores[$i] == $valor1) {
                        $indice1 = $i;
                    }
                    if ($valores[$i] == $valor2) {
                        $indice2 = $i;
                    }
                }

                // Comparamos los índices para determinar el mayor
                if ($indice1 > $indice2) {
                    echo "<p class='no-pareja'>No es una pareja.</p>";
                    echo "<p class='valor-alto'>La carta más alta es {$valor1} de {$palo1}.</p>";
                } else {
                    echo "<p class='no-pareja'>No es una pareja.</p>";
                    echo "<p class='valor-alto'>La carta más alta es {$valor2} de {$palo2}.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>