<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina el Número</title>
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
        .mensaje {
            font-weight: bold;
            margin-top: 15px;
        }
        .acierto {
            color: green;
        }
        .calentito {
            color: orange;
        }
        .fallo {
            color: red;
        }
        input[type="number"] {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 80%;
            margin-top: 10px;
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
    // Inicializamos el número aleatorio y los intentos
    if (!isset($_POST['numero']) && !isset($_POST['intentos'])) {
        $numeroAleatorio = rand(1, 100);
        $intentos = 0;
    } else {
        $numeroAleatorio = (int)$_POST['numero'];
        $intentos = (int)$_POST['intentos'];
    }

    // Verificamos si se ha enviado un número
    if (isset($_POST['numeroUsuario'])) {
        $numeroUsuario = (int)$_POST['numeroUsuario'];
        $intentos++;

        // Comprobamos si hemos superado los intentos
        if ($intentos >= 6) {
            echo "<h2>Lo siento, has agotado tus intentos.</h2>";
            echo "<p class='fallo mensaje'>El número correcto era: $numeroAleatorio.</p>";
            echo "<form method='post'><button type='submit' name='reset'>Jugar de nuevo</button></form>";
            exit;
        }

        // Verificamos si el número es correcto
        if ($numeroUsuario === $numeroAleatorio) {
            echo "<h2>¡Felicidades! Has acertado el número en $intentos intentos.</h2>";
            echo "<p class='acierto mensaje'>El número era: $numeroAleatorio.</p>";
            echo "<form method='post'><button type='submit' name='reset'>Jugar de nuevo</button></form>";
            exit;
        } elseif ($numeroUsuario >= $numeroAleatorio - 5 && $numeroUsuario <= $numeroAleatorio + 5) {
            echo "<p class='calentito mensaje'>¡Calentito totalis!</p>";
        } elseif ($numeroUsuario < $numeroAleatorio) {
            echo "<p class='fallo mensaje'>El número es mayor.</p>";
        } else {
            echo "<p class='fallo mensaje'>El número es menor.</p>";
        }
    }

    // Reseteamos el juego
    if (isset($_POST['reset'])) {
        $numeroAleatorio = rand(1, 100);
        $intentos = 0;
    }
    ?>

    <h2>Adivina el número (1-100)</h2>
    <p>Intento: <?php echo $intentos; ?> de 6</p>
    <form method="post">
        <input type="hidden" name="numero" value="<?php echo $numeroAleatorio; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <input type="number" name="numeroUsuario" min="1" max="100" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
</div>

</body>
</html>