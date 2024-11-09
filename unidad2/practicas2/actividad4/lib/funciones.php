<?php
// Función de suma de enteros
function sumaEnteros($enteros) {
    return array_sum($enteros);
}

// Función de suma de floats
function sumaFloats(array &$floats) {
    return array_sum($floats);
}

// Función total de enteros y floats
function sumaTotal($enteros, $floats) {
    return sumaEnteros($enteros) + sumaFloats($floats);
}

// Función para calcular la media de los datos
function calcularMedia($datos) {
    $total = array_sum($datos);
    return $total / count($datos);
}

// Función para calcular la sucesión aritmética
function sucesionAritmetica($limite) {
    $sucesion = [];
    for ($i = 0; $i < 10; $i++) {
        $sucesion[] = $limite + $i;
    }
    return implode(", ", $sucesion);
}

// Función para calcular el factorial
function calcularFactorial($enteros, $limite) {
    $num = $enteros[$limite - 1] ?? $limite;
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

// Función de contar la palabra más larga
function palabraMasLarga($strings) {
    $palabraLarga = '';
    foreach ($strings as $palabra) {
        if (strlen($palabra) > strlen($palabraLarga)) {
            $palabraLarga = $palabra;
        }
    }
    return trim($palabraLarga);
}
?>