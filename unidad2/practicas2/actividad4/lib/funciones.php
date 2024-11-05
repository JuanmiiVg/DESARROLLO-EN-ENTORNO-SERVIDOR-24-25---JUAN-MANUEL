<?php
// Suma de enteros
function sumaEnteros(array $datos) {
    $suma = 0;
    foreach ($datos as $linea) {
        foreach ($linea as $valor) {
            if (is_int($valor + 0)) {
                $suma += (int)$valor;
            }
        }
    }
    return $suma;
}

// Suma de floats
function sumaFloats($datos) {
    $suma = 0.0;
    foreach ($datos as $linea) {
        foreach ($linea as $valor) {
            if (is_float($valor + 0)) {
                $suma += (float)$valor;
            }
        }
    }
    return $suma;
}

// Calcular media
function calcularMedia(&$datos) {
    $suma = 0;
    $contador = 0;
    foreach ($datos as $linea) {
        foreach ($linea as $valor) {
            if (is_numeric($valor)) {
                $suma += $valor;
                $contador++;
            }
        }
    }
    return $contador > 0 ? $suma / $contador : 0;
}

// Generar sucesión aritmética
function generarSucesion($inicio) {
    return array_map(fn($i) => $inicio + $i, range(0, 9));
}

// Calcular factorial
function calcularFactorial(array $datos, $posicion) {
    $numero = $datos[$posicion - 1][0] ?? $posicion;
    return array_product(range(1, $numero));
}

// Encontrar palabra más larga en la última línea
function palabraMasLarga($datos) {
    $ultimaLinea = $datos[count($datos) - 1];
    $palabraMasLarga = '';
    foreach ($ultimaLinea as $palabra) {
        if (strlen($palabra) > strlen($palabraMasLarga)) {
            $palabraMasLarga = $palabra;
        }
    }
    return $palabraMasLarga;
}
?>