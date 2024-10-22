<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del 1 Simplificado</title>
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
            padding: 50px;
            width: 350px;
        }
        .cartas {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }
        .cartas img {
            width: 80px;
            height: auto;
            cursor: pointer;
        }
        .resultado {
            font-weight: bold;
            font-size: 20px;
            margin-top: 15px;
        }
        .felicitacion {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Iniciar la sesión para almacenar la carta del medio
    session_start();

    // Definimos los colores y números disponibles
    $colores = ['Rojo', 'Azul'];
    $numeros = [1, 2, 3, 4, 5];

    // Función para generar una carta aleatoria
    function generarCartaAleatoria($colores, $numeros) {
        $color = $colores[array_rand($colores)];
        $numero = $numeros[array_rand($numeros)];
        return [
            'color' => $color,
            'numero' => $numero
        ];
    }

    // Comprobar si se ha enviado el formulario para repetir la mano
    if (isset($_POST['repetir'])) {
        // Solo regenerar la mano del jugador
        $mano = [];
        for ($i = 0; $i < 4; $i++) {
            $mano[] = generarCartaAleatoria($colores, $numeros);
        }
    } else {
        // Generar la carta que sale en medio solo si no está en sesión
        if (!isset($_SESSION['cartaMedio'])) {
            $_SESSION['cartaMedio'] = generarCartaAleatoria($colores, $numeros);
        }

        // Generar la mano del jugador al cargar la página por primera vez
        $mano = [];
        for ($i = 0; $i < 4; $i++) {
            $mano[] = generarCartaAleatoria($colores, $numeros);
        }
    }

    // Comprobar si se ha enviado una carta válida
    $mensaje = "";
    if (isset($_POST['carta'])) {
        $cartaSeleccionada = explode('_', $_POST['carta']); // Formato: numero_color
        $numeroSeleccionado = $cartaSeleccionada[0];
        $colorSeleccionado = $cartaSeleccionada[1];

        // Comprobar si es una jugada válida
        if ($numeroSeleccionado == $_SESSION['cartaMedio']['numero'] || $colorSeleccionado == $_SESSION['cartaMedio']['color']) {
            // Generar una nueva carta del medio al seleccionar una carta válida
            $_SESSION['cartaMedio'] = generarCartaAleatoria($colores, $numeros);
            $mensaje = "<p class='felicitacion'>¡Felicidades! Has seleccionado una carta válida.</p>";
        } else {
            $mensaje = "<p class='resultado'>Carta no válida. Inténtalo de nuevo.</p>";
        }
    }

    // Mostrar la carta que sale en medio
    echo "<h2>Carta que sale en medio:</h2>";
    echo "<div class='cartas'>";
    echo "<img src='img/{$_SESSION['cartaMedio']['numero']}_{$_SESSION['cartaMedio']['color']}.png' alt='Carta en Medio'>";
    echo "</div>";

    // Mostrar la mano del jugador
    echo "<h2>Tu mano:</h2>";
    echo "<form method='post'>";
    echo "<div class='cartas'>";
    foreach ($mano as $carta) {
        $nombreCarta = "{$carta['numero']}_{$carta['color']}";
        echo "<button type='submit' name='carta' value='{$nombreCarta}'>";
        echo "<img src='img/{$nombreCarta}.png' alt='Carta'>"; // Aquí debería tener las imágenes de las cartas
        echo "</button>";
    }
    echo "</div>";
    echo "<button type='submit' name='repetir'>Repetir mano</button>";
    echo "</form>";

    // Mostrar el mensaje si existe
    if ($mensaje) {
        echo "<div class='resultado'>$mensaje</div>";
    }
    ?>
</div>

</body>
</html>