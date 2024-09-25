<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num1=23 . "40";
    $num2="24";
    $num3=$num1 + $num2;
    $num1="veintitres";
    

    $texto = "<br/>estamos en la clase daw de 2 daw, aunque sea perogrullo";

    print $num1;
    print "<br/> La suma de 23 y 24 es $num3";

    if (2>=2) { 
        //nombre esta declarada dentro del if solo accesible dentro del if
        $nombre="pepe";
        print "<br/> Entra";
    }

    // Si utilizamos comillas simples para las cadenas de texto
    //no se pueden meter variables dentro
    print '<br/> El nombre es $nombre';
    echo "<br/> El nombre es $nombre <br/>";

    //strlen nos dice cuantos caracteres tiene un string
    print "El nombre tiene " .strlen($nombre)." caracteres <br/>";

    var_dump($nombre);

    $empleado = array("pedro",34,2345.3,"soltero");
    echo "<br/>";

    //count nos cuenta la cantidad de elementos de un array
    print("<br/>El array empleado tiene ".count($empleado)." elementos");

    //var_dump($empleado);

    //strcmp();
    //strok similar a explode()
    //strwordcount

    print $texto;

    // str_replace remplaza la palabra que esta como primer parámetro por la segunda
    //Por defecto reemplaza todas las ocurrencias
    print str_replace("daw","smr",$texto);

    //explode corta una cadena y devuelve un array de secciones de dicha cadena
    //Hay que indicarle el carácter separador
    var_dump( explode("  ",$texto));
    
    ?>
</body>
</html>