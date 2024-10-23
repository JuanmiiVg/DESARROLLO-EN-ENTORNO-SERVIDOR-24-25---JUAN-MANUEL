<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    function posicion_x_ocurrencia($texto,$palabra,$numero_ocurrencia)
    {
        //Vamos a usar contador para saber cuantas palabras hemos encontrado
        $contador=0;
        //Ponemos a -1 la primera posición para que pueda encontrar una palabra en la que 
        //empiece al principio, ya que la primera ocurrencia empieza en 0
        //Si no encuentra la palabra indica que no hay hasta esa ocurrencia/repitición
        $pos= -1;
        while ($contador < $numero_ocurrencia)
        {
            $pos = strpos($texto, $palabra, $pos+1);
            //Si no encuentra la palabra indica que no hay hasta esa ocurrencia/repitición
            if ($pos === false) return -1;

            //Incrementamos la cantidad de palabras que hemos encontrado
            $contador++;
        }
        return $pos;
    }

    $nombre = "Juanjo";
    $nota = 8.65456456;
    $texto = sprintf("%s tiene una nota jamon y 2 jamon de %.2f.<br/>",$nombre, $nota);
    
    $cantidad = 0;
    $texto2 = str_replace("jamon", "pavo", $texto,$cantidad);


    //substr me devuelve una parte de una cadena de la cadena original, introduciendo un indice inicial y el indice final
    //$texto = substr($texto, 20, 10);



    echo $texto;
    echo $texto2;
    print'Se ha encontrado una nota de ' . $cantidad . ' jamones en el texto reemplazado.<br/>';

    $texto3 = "piña tenia yo una piña muy amarilla y otro una piña muy piña, que resulto una piña verde";
    print "La posición de la x piña es: ".posicion_x_ocurrencia($texto3,"piña",3)."<br/>";

    $letra = chr(145);
    print str_pad($letra, 8, "#");
    ?>


</body>
</html>