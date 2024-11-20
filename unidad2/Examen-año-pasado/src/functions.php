<?php
    function cumpleDomicilio($textoCasas) {
    $lineas = explode("\n", trim($textoCasas));
    $provincias = [];
    $numCasas = count($lineas);
    $cumpleCondiciones = true;

    foreach ($lineas as $linea) {
        $datos = preg_split('/\s+/', $linea);
        if (count($datos) != 4) {
            continue; // Skip invalid lines
        }
        $provincia = $datos[0];
        $habitaciones = (int)$datos[1];
        $piso = (int)$datos[2];
        $viviendaHabitual = $datos[3];

        if (!in_array($provincia, $provincias)) {
            $provincias[] = $provincia;
        }
    }

    if (count($provincias) > 1 || $numCasas > 2) {
        $cumpleCondiciones = false;
    }

    return [
        'cumpleCondiciones' => $cumpleCondiciones,
        'numCasas' => $numCasas
    ];
}

function cumpleHijos($textoHijos) {
    $lineas = explode("\n", trim($textoHijos));
    $numHijosMenores14 = 0;
    $numHijosConMinusvalia = 0;
    $totalEdad = 0;
    $numHijos = count($lineas);

    foreach ($lineas as $linea) {
        $datos = preg_split('/\s+/', $linea);
        if (count($datos) != 4) {
            continue; // Skip invalid lines
        }
        $edad = (int)$datos[1];
        $sexo = $datos[2];
        $minusvalia = $datos[3];

        if ($edad < 14) {
            $numHijosMenores14++;
        }
        if ($minusvalia === 'H') {
            $numHijosConMinusvalia++;
        }
        $totalEdad += $edad;
    }

    $mediaEdad = $numHijos > 0 ? $totalEdad / $numHijos : 0;
    $cumpleCondiciones = ($numHijosMenores14 >= 2 || $numHijosConMinusvalia >= 1);

    return [
        'cumpleCondiciones' => $cumpleCondiciones,
        'media' => $mediaEdad
    ];
}   