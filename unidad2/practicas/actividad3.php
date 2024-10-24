<!DOCTYPE html>
<html lang="es">
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
        <h2>Juego de Cartas</h2>
        <?php
        // Arrays para los valores y los palos
        $valores = array('2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
        $palos = array('hearts', 'diamonds', 'clubs', 'spades');

        // Seleccionamos dos cartas al azar
        $Valor1 = rand(0, 12);
        $Palo1 = rand(0, 3);

        $Valor2 = rand(0, 12);
        $Palo2 = rand(0, 3); 

        // Nos aseguramos de que la segunda carta sea diferente de la primera
        while ($Valor1 == $Valor2 && $Palo1 == $Palo2) {
            $Valor2 = rand(0, 12);
            $Palo2 = rand(0, 3);
        }

        // Determinamos si las cartas tienen el mismo valor
        $esPareja = false;
        if ($Valor1 == $Valor2) {
            $esPareja = true;
        }

        // Determinamos el valor mayor manualmente
        $valorMayor = $valores[$Valor1];
        if ($Valor2 > $Valor1) {
            $valorMayor = $valores[$Valor2];
        }

        // Convertimos los valores especiales para el nombre de la imagen
        function convertirValor($valor) {
            switch ($valor) {
                case 'J':
                    return 'jack';
                case 'Q':
                    return 'queen';
                case 'K':
                    return 'king';
                case 'A':
                    return 'ace';
                default:
                    return $valor;
            }
        }
        ?>

        <div class="cartas">
            <div>
                <p>Primera carta: <?php echo $valores[$Valor1] . " de " . $palos[$Palo1]; ?></p>
                <img src="img/<?php echo convertirValor($valores[$Valor1]) . "_of_" . $palos[$Palo1]; ?>.png" alt="Primera carta">
            </div>
            <div>
                <p>Segunda carta: <?php echo $valores[$Valor2] . " de " . $palos[$Palo2]; ?></p>
                <img src="img/<?php echo convertirValor($valores[$Valor2]) . "_of_" . $palos[$Palo2]; ?>.png" alt="Segunda carta">
            </div>
        </div>

        <div class="resultado <?php echo $esPareja ? 'pareja' : 'no-pareja'; ?>">
            <?php echo $esPareja ? '¡Es una pareja!' : 'No es una pareja.'; ?>
        </div>

        <div class="valor-alto">
            <p>El valor mayor es: <?php echo $valorMayor; ?></p>
        </div>
    </div>
</body>
</html>