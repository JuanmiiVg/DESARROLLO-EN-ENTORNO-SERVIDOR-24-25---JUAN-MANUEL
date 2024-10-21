<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra, Papel, Tijeras, Lagarto, Spock</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 50px;
        }
        .container {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f0f0f0;
        }
        .result img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Piedra, Papel, Tijeras, Lagarto, Spock</h2>
    <form method="post">
        <button type="submit" name="play">Jugar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['play'])) {
        $opciones = ["Piedra", "Papel", "Tijeras", "Lagarto", "Spock"];
        $ganadasJugador1 = 0;
        $ganadasJugador2 = 0;
        $rondas = 3;

        function determinarGanador($jugador1, $jugador2) {
            if ($jugador1 === $jugador2) return "empate";

            switch ($jugador1) {
                case "Piedra":
                    return ($jugador2 === "Tijeras" || $jugador2 === "Lagarto") ? "jugador1" : "jugador2";
                case "Papel":
                    return ($jugador2 === "Piedra" || $jugador2 === "Spock") ? "jugador1" : "jugador2";
                case "Tijeras":
                    return ($jugador2 === "Papel" || $jugador2 === "Lagarto") ? "jugador1" : "jugador2";
                case "Lagarto":
                    return ($jugador2 === "Papel" || $jugador2 === "Spock") ? "jugador1" : "jugador2";
                case "Spock":
                    return ($jugador2 === "Piedra" || $jugador2 === "Tijeras") ? "jugador1" : "jugador2";
            }
        }

        echo "<div class='result'>";
        for ($i = 1; $i <= $rondas; $i++) {
            $manoJugador1 = $opciones[array_rand($opciones)];
            $manoJugador2 = $opciones[array_rand($opciones)];

            echo "<p>Ronda $i:</p>";
            echo "<img src='img/{$manoJugador1}.png' alt='{$manoJugador1}'>";
            echo "<img src='img/{$manoJugador2}.png' alt='{$manoJugador2}'>";

            $resultado = determinarGanador($manoJugador1, $manoJugador2);
            if ($resultado === "jugador1") {
                echo "<p>Ganador: Jugador 1</p>";
                $ganadasJugador1++;
            } elseif ($resultado === "jugador2") {
                echo "<p>Ganador: Jugador 2</p>";
                $ganadasJugador2++;
            } else {
                echo "<p>Empate</p>";
            }
        }
        echo "</div>";

        // Determinar el ganador al mejor de 3
        echo "<h3>";
        if ($ganadasJugador1 > $ganadasJugador2) {
            echo "Jugador 1 gana la competición al mejor de 3.";
        } elseif ($ganadasJugador2 > $ganadasJugador1) {
            echo "Jugador 2 gana la competición al mejor de 3.";
        } else {
            echo "La competición termina en empate.";
        }
        echo "</h3>";
    }
    ?>
</div>
</body>
</html>