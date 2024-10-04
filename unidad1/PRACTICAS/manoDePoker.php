<?php

// Array con los valores de las cartas
$valores = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

// Array con los palos de las cartas
$palos = ['Corazones', 'Diamantes', 'Tréboles', 'Picas'];

// Bucle para generar 5 cartas aleatorias
for ($i = 0; $i < 5; $i++) {
    // Seleccionar un valor aleatorio del array de valores
    $valorAleatorio = $valores[array_rand($valores)];
    
    // Seleccionar un palo aleatorio del array de palos
    $paloAleatorio = $palos[array_rand($palos)];

    // Imprimir la carta seleccionada
    echo "$valorAleatorio de $paloAleatorio<br>";
}

?>
