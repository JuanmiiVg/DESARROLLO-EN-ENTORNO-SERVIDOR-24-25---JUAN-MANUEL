<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    //en php los arrays tienen un tamaño dinámico, le podemos añadir elementos sin problemas
    //También puede combinar datos de distinto tipo, incluso arrays dentro de otros
    $alumno = ["jose", 23, false, 6.78, ["petito", 23, 11500]];

    //Para acceder a los elementos del array utilizamos el operador []
    //Si dentro de un array hay otro array y queremos acceder a algun elemento interno
    //Utilizamos dos veces [] el primero es la posición del array interno dentro del array principal
    //y el segundo la posición del elemento
    print $alumno[4][2]."<br/>";

    //Alumno = "final"
    $alumno[]="final";


    //Array de 10 numeros aleatorios
    for ($i=0; $i < 10; $i++) { 
        $lista_numeros[] = rand(1,100);
    }
    print("El valor máximo es: ".max($lista_numeros)."<br/>");
    print("El valor mínimo es: ".min($lista_numeros)."<br/>");
    print("La media es: ".array_sum($lista_numeros)/count($lista_numeros)."<br/>");

    print_r($lista_numeros);
    
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    $avg = 0;
    for ($i=0; $i < count($lista_numeros); $i++) { 

        //Vamos sumando en avg todos los numeros
        $avg += $lista_numeros[$i];

        //El mínimo se hace comprobando el número en la posición $i 
        //Si es menor que nuestro mínimo temporal
        if ($lista_numeros[$i] < $min) {
            $min = $lista_numeros[$i];
        }
        //El máximo se hace comprobando el número en la posición $i 
        //Si es mayor que nuestro máximo temporal
        if ($lista_numeros[$i] > $max) {
            $max = $lista_numeros[$i];
        }
    }

    //Calculamos la media
    $avg = $avg / count($lista_numeros);

    echo "<br/>"."El mínimo es: ".$min."<br/>";
    echo "El máximo es: ".$max."<br/>";
    echo "La media es: ".$avg."<br/>";

    $lista_letras = ['a','e','z'];

    print  "<br/>";
    print_r($lista_letras);
    print "<br/>";
    unset($lista_letras[1]);
    print  "<br/>";
    print_r($lista_letras);
    print "<br/>";

    //unset elimina un elemento del array


    if (isset($lista_letras[2])) 
        print "Existe la posición 2 del array";

    if (isset($lista_letras[4]))
        print "Existe la posición 4 del array";
    
    //Con print_r mostramos el contenido de un array
    print_r($alumno);

    ?>
</body>
</html>