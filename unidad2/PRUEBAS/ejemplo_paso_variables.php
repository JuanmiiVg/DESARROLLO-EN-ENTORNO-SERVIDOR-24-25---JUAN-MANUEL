<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function maximo()
    {
        //Con get args podemos recuperar todos los argumentos de una función
        //lo devuelve en un array
        $paramentros = func_get_args();

        $mas = PHP_INT_MIN;

        //usamos la función max para devolver el maximo de los números
        return max($paramentros);

    }

    /**
     * Funcion que devuelve el resultado de elevar un numero a una potencia dada
     *
     * @param int $numero El numero a elevar
     * @param int $potencia La potencia a la que se va a elevar
     * @return int El resultado de la potencia
     */

     //La función recibe un número y una potencia y devuelve el número elevado a esa potencia
    function powertotalis($numero,$potencia)
    {

        $numero = $numero ** $potencia;
        echo $numero;

    }

    //Para pasar por valor una variable a una función hay que poner delante el ampersand &
    //Esto hace que yo pueda modificar el valor de esa variable y se queda modificado
    //Después de la ejecución de la función
    function powertotalis_ref(&$numero,$potencia)
    {

        $numero = $numero ** $potencia;
        echo $numero."<br>";

    }

    $valor = 3;
    powertotalis($valor,3);

    echo $valor."<br>";

    powertotalis_ref($valor,3);

    echo $valor."<br>";

    echo maximo(23,24,1,-2,0,345,223)."<br>";
    ?>
</body>
</html>

