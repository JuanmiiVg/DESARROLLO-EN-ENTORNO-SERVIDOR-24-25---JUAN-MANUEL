<?php
// Versión 1:Utilizando funciones de php
function obtenerValorPalabra($palabra) {
    $valor = 0;
    $alfabeto = 'abcdefghijklmnñoopqrstuvwxyz';
    for ($i = 0; $i < strlen($palabra); $i++) {
        // Calculamos la posición de la letra en el alfabeto manualmente
        $letra = $palabra[$i];
        $posicion = 0;
        
        // Recorremos el alfabeto para encontrar la posición de la letra
        for ($j = 0; $j < strlen($alfabeto); $j++) {
            if ($letra == $alfabeto[$j]) {
                $posicion = $j + 1;
                break;
            }
        }
        
        // Sumamos el valor de la letra
        $valor += $posicion;
    }
    return $valor;
}

// Versión 2: Usando un array asociativo
function obtenerValorPalabraArray($palabra) {
    $valores = [
        'a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7,
        'h' => 8, 'i' => 9, 'j' => 10, 'k' => 11, 'l' => 12, 'm' => 13, 'n' => 14,
        'ñ' => 15, 'o' => 16, 'p' => 17, 'q' => 18, 'r' => 19, 's' => 20, 't' => 21,
        'u' => 22, 'v' => 23, 'w' => 24, 'x' => 25, 'y' => 26, 'z' => 27
    ];
    $valor = 0;
    for ($i = 0; $i < strlen($palabra); $i++) {
        $valor += $valores[$palabra[$i]];
    }
    return $valor;
}

// Versión 3: Comparando dos palabras
function compararPalabras($palabra1, $palabra2) {
    $valor1 = obtenerValorPalabra($palabra1);
    $valor2 = obtenerValorPalabra($palabra2);
    
    if ($valor1 > $valor2) {
        return "La palabra '$palabra1' tiene un mayor valor.";
    } elseif ($valor2 > $valor1) {
        return "La palabra '$palabra2' tiene un mayor valor.";
    } else {
        return "Ambas palabras tienen el mismo valor.";
    }
}
?>