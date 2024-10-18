<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function inverso($cadena){
        $cad_inversa="";

        //Rrecorremos la cadena desde el final hasta el principio
        //con $i y vamos asignando cada carácter a la inversa
        for ($i=strlen($cadena)-1; $i >= 0; $i--) {
            $cad_inversa = $cad_inversa . $cadena[$i];
        }
    }

    //devolvemos la cadena inversa
    return $cad_inversa;

    /**
     * Comprueba si una palabra es palíndromo o no
     * 
     * @param string $palabra La palabra a comprobar
     * @return boolean True si es palíndromo, false en caso contrario
     */
    function esPalindromo($palabra){
        

            //Tendremos que recorrer la cadena hasta la mitad solo, si es impar tendremos que recorrer la mitad menos 1
            //Al convertir a entero hacemos que siendo impar sea uno menos
            //es decir si tienes 5 caráteres la mitad es 2.5 al truncar convirtiendo a entero
            //se queda en 2
            $mitad = (int)strlen($palabra)/2;

            $esPal=true;
            //Rrecorremos todas las tareas y comprobamos que son iguales a sus simetricas
            for ($i=0; $i <= $mitad; $i++) {

                //Comparamos letra a letra la posición actual del índice i con
                //su inversa, que sera la última posición de la cadena (strlen-1) menos la i
                if($palabra[$i]!=$palabra[strlen($palabra)-1-$i]){
                    $esPal=false;
                    return false;
                }
            }
            //Si llega al final del bucle sin salir implica que todas las letras son iguales
            return true;
    }
 
    #Este fichero recibe un formulario html dos datos, una palabra con type text
    #y un texto de varias lineas con un textarea y un checkbox que diga si ignora o no mayusculas
    #El programa contará la cantidad de palabras totales, la cantidad de palabras que sean palindromos
    #la cantidad de veces que esta la palabra que se recibe, la cantidad de lineas y la cantidad de frases(
    #cada frase tiene un punto final)
    #se devolvera en un array asociativo con todos los valores resultados
   // $resultado = ["palabrasTotales"=>12, "palindromos" =>0,];
    
    //Recoger datos del formulario
    if (isset($_POST["palabra"])) $palabra = $_POST["palabra"];
    //Diferencias de mayusculas
    if (isset($_POST["ignoraMayusculas"])) $ignoraMayusculas = true; else $ignoraMayusculas = false;
    if (isset($_POST["texto"])) $texto = $_POST["texto"];
    
    //Separamos en linea
    $lineas = explode("\n", $texto);

    //Asignamos la cantidad de lineas del texto a la clave numLineas
    $resultado["numLineas"] = count($lineas);

    //Recorremos cada linea
    foreach($lineas as $linea){

        //Separamos en palabras cada línea
        $palabras = explode(" ", $linea);

        //Guardamos la cantidad de palabras
        $numPalabras = $num_Palabras + count($palabras);
        
        //Para contar la cantidad de puntos hago un explode de cada línea
        //Separando por .
        //Si el array resultante solo tiene un elemento implica que no hay ningún .
        //Si hay por ejemplo 3 puntos, el array tendrá 4 elementos
        //Implica que restando el 1 al count del explode me dará la cantidad de .
        //que hay en esta linea;
        $num_frases = $num_frases + count(explode(".", $linea))-1;

        //Recorro todas las palabras
        foreach($palabra as $palabra){

            $palabra=trim($palabra);
            echo "-".$palabra."-<br/>";

            //Si el checkbox de ignorar mayusculas esta activado lo pasamos todo a minusculas
            if ($ignoraMayusculas){
                $palabra = strtolower($palabra);
                $palabra_buscada = strtolower($palabra_buscada);
            }
            //Si la palabra actual de la frase es la buscada
            //incremento la cantidad de palabras encontradas
            if($palabra == $palabra)
            $num_Palabra_buscar++;

            if ($palabra==inverso($palabra)){
                $num_Palabras_palindromos++;

            if (esPalindromo($palabra))
            $num_Palindromosv2++;
            }
        }
        }
    //Buscar por segmentos las palabras par


    //Separamos en palabras
    $palabras = explode(" ", $texto);

    // Guardamos la cantidad de palabras
    $resultado["numPalabras"] = count($palabras)+1;
    $resultado["numFrase"] = $num_frases;
    $resultado["numPalabraBuscada"]= $num_Palabras_buscar;
    $resultado["numPalindromos1"] = $num_Palindromos;
    $resultado["numPalindromos2"] = $num_Palindromosv2;

    $var_dump = var_dump($palabra);

    var_dump($lineas);    
    var_dump(explode(".","y mi casa bonita"));

    ?>
</body>
</html>