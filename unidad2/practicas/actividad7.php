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
        // Definimos las cartas y colores posibles
        $carta = array("1", "2", "3", "4", "5");
        $color = array("Azul", "Rojo");

        // Si no se ha enviado la carta del centro, o si se ha solicitado repetir, conservamos la carta del medio
        if (!isset($_POST['carta_centro']) || isset($_POST['repetir'])) {
            // Mantenemos la carta del centro original si se repite la mano
            if (!isset($_POST['carta_centro'])) {
                $carta_aleatoria = rand(0, 4);
                $color_aleatoria = rand(0, 1);
                $carta_centro = $carta[$carta_aleatoria];
                $color_centro = $color[$color_aleatoria];
            } else {
                $carta_centro = $_POST['carta_centro'];
                $color_centro = $_POST['color_centro'];
            }
        } else {
            $carta_centro = $_POST['carta_centro'];
            $color_centro = $_POST['color_centro'];
        }

        // Comprobamos si se ha seleccionado una carta del jugador
        $mensaje = "";
        if (isset($_POST['carta_usuario'])) {
            $carta_seleccionada = $_POST['carta_usuario'];

            // Verificamos si la carta seleccionada contiene el carácter "_"
            if (strpos($carta_seleccionada, "_") !== false) {
                list($numero, $color_jugador) = explode("_", $carta_seleccionada);

                // Verificamos si la carta seleccionada es válida
                if ($numero == $carta_centro || $color_jugador == $color_centro) {
                    $mensaje = "<p class='resultado felicitacion'>¡Felicidades! Jugada válida.</p>";
                    // Cambiamos la carta del centro si la jugada es válida
                    $carta_aleatoria = rand(0, 4);
                    $color_aleatoria = rand(0, 1);
                    $carta_centro = $carta[$carta_aleatoria];
                    $color_centro = $color[$color_aleatoria];
                } else {
                    $mensaje = "<p class='resultado'>Carta no válida. Inténtalo de nuevo.</p>";
                }
            } else {
                $mensaje = "<p class='resultado'>Error: Formato de carta inválido.</p>";
            }
        }

        echo "<p>La carta del centro es:</p>";
        echo "<img src='img/" . $carta_centro . "_" . $color_centro . ".png' alt='carta' class='img-fluid'>";

        // Generamos las cartas del jugador
        $mano_jugador = array();
        for ($i = 0; $i < 4; $i++) {
            $carta_random = rand(0, 4);
            $color_random = rand(0, 1);
            $mano_jugador[] = $carta[$carta_random] . "_" . $color[$color_random];
        }
    ?>

    <div class="cartas">
        <form method="post">
            <input type="hidden" name="carta_centro" value="<?php echo $carta_centro; ?>">
            <input type="hidden" name="color_centro" value="<?php echo $color_centro; ?>">
            <?php
                // Mostramos las cartas del jugador como botones
                foreach ($mano_jugador as $carta_jugador) {
                    echo "<button type='submit' name='carta_usuario' value='$carta_jugador'>";
                    echo "<img src='img/$carta_jugador.png' alt='carta'>";
                    echo "</button>";
                }
            ?>
        </form>
    </div>

    <div>
        <form method="post">
            <input type="hidden" name="carta_centro" value="<?php echo $carta_centro; ?>">
            <input type="hidden" name="color_centro" value="<?php echo $color_centro; ?>">
            <button type="submit" name="repetir" class="btn btn-primary">Repetir mano</button>
        </form>
    </div>

    <?php
        // Mostramos el mensaje de resultado
        echo $mensaje;
    ?>
</div>
</body>
</html>