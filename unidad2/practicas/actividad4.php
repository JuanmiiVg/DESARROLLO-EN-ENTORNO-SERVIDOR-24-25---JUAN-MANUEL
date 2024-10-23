<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Monedas</title>
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
            width: 300px;
        }
        h2 {
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .resultado {
            font-weight: bold;
            font-size: 20px;
            margin-top: 15px;
        }
        .ganador {
            color: green;
        }
        .perdedor {
            color: red;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Simulamos tirada de monedas para los dos jugadores
    $jugador1 = [];
    $jugador2 = [];

    // Lanzamos dos monedas para el jugador 1
    for ($i = 0; $i < 2; $i++) {
        $jugador1[$i] = rand(0, 1) === 0 ? 'cara' : 'cruz';
    }

    // Lanzamos dos monedas para el jugador 2
    for ($i = 0; $i < 2; $i++) {
        $jugador2[$i] = rand(0, 1) === 0 ? 'cara' : 'cruz';
    }

    // Determinamos si algún jugador ha ganado
    $ganaJugador1 = ($jugador1[0] === 'cara' && $jugador1[1] === 'cara');
    $ganaJugador2 = ($jugador2[0] === 'cara' && $jugador2[1] === 'cara');

    // Mostramos resultados
    echo "<h2>Tirada de los jugadores:</h2>";
    echo "<p>Jugador 1: " . $jugador1[0] . " y " . $jugador1[1] . "</p>";
    echo "<p>Jugador 2: " . $jugador2[0] . " y " . $jugador2[1] . "</p>";

    echo "<div class='resultado'>";
    if ($ganaJugador1 && $ganaJugador2) {
        echo "<p class='ganador'>¡Ambos jugadores han ganado con dos caras!</p>";
    } elseif ($ganaJugador1) {
        echo "<p class='ganador'>¡El jugador 1 ha ganado con dos caras!</p>";
    } elseif ($ganaJugador2) {
        echo "<p class='ganador'>¡El jugador 2 ha ganado con dos caras!</p>";
    } else {
        echo "<p class='perdedor'>Ningún jugador ha ganado. Intenta de nuevo.</p>";

        // Mostrar botón para recargar la página y volver a jugar
        echo "<form method='post'>";
        echo "<button type='submit'>Volver a tirar</button>";
        echo "</form>";
    }
    echo "</div>";
    ?>
</div>
</body>
</html>