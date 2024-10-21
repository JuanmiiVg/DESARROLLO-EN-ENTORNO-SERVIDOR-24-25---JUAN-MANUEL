<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Uno Simplificado</title>
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
        .cards img {
            width: 100px;
            height: 150px;
            margin: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Juego de Uno Simplificado</h2>
    <?php
    // Función para generar una carta aleatoria
    function generarCarta() {
        $colores = ["rojo", "azul"];
        $numeros = range(1, 5);
        $color = $colores[array_rand($colores)];
        $numero = $numeros[array_rand($numeros)];
        return ["color" => $color, "numero" => $numero];
    }

    // Verificar si hay una carta actual en la sesión
    session_start();
    if (!isset($_SESSION['carta_actual'])) {
        $_SESSION['carta_actual'] = generarCarta(); // Generar carta dada la vuelta
    }
    $cartaActual = $_SESSION['carta_actual'];

    // Generar mano de jugador o usar la existente
    if (!isset($_SESSION['mano']) || isset($_POST['repetir'])) {
        $_SESSION['mano'] = [generarCarta(), generarCarta(), generarCarta(), generarCarta()];
    }
    $mano = $_SESSION['mano'];

    // Verificar si se ha seleccionado una carta válida
    if (isset($_POST['seleccion'])) {
        $seleccion = json_decode($_POST['seleccion'], true);
        if ($seleccion['color'] === $cartaActual['color'] || $seleccion['numero'] == $cartaActual['numero']) {
            echo "<p style='color: green;'>¡Felicidades! Has jugado una carta válida.</p>";
        } else {
            echo "<p style='color: red;'>Carta no válida. Intenta nuevamente.</p>";
        }
    }

    // Mostrar la carta dada la vuelta
    echo "<h3>Carta dada la vuelta:</h3>";
    echo "<div class='cards'>";
    echo "<img src='practicas/img/{$cartaActual['color']}_{$cartaActual['numero']}.png' alt='Carta dada la vuelta'>";
    echo "</div>";

    // Mostrar las cartas de la mano
    echo "<h3>Tu mano:</h3>";
    echo "<form method='post'>";
    echo "<div class='cards'>";
    foreach ($mano as $carta) {
        $cartaJson = htmlspecialchars(json_encode($carta));
        echo "<button type='submit' name='seleccion' value='{$cartaJson}'>";
        echo "<img src='practicas/img/{$carta['color']}_{$carta['numero']}.png' alt='Carta de la mano'>";
        echo "</button>";
    }
    echo "</div>";
    echo "</form>";

    // Botón para repetir la mano del jugador
    echo "<form method='post'>";
    echo "<button type='submit' name='repetir'>Repetir mano</button>";
    echo "</form>";
    ?>
</div>
</body>
</html>
