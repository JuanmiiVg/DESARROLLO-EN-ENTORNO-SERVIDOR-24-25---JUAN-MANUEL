<?php
// process.php

// Include functions file
include 'functions.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name = '';
    }

    if (isset($_POST['category'])) {
        $category = $_POST['category'];
    } else {
        $category = '';
    }

    $isDigital = isset($_POST['digital']) && $_POST['digital'] === 'yes';

    if (isset($_POST['developer'])) {
        $developer = $_POST['developer'];
    } else {
        $developer = '';
    }

    if (isset($_POST['price'])) {
        $basePrice = $_POST['price'];
    } else {
        $basePrice = 0;
    }

    if (isset($_POST['release_date'])) {
        $releaseDate = $_POST['release_date'];
    } else {
        $releaseDate = '';
    }

    if (isset($_POST['phases'])) {
        $phasesText = $_POST['phases'];
    } else {
        $phasesText = '';
    }

    if (isset($_POST['warehouses'])) {
        $warehousesText = $_POST['warehouses'];
    } else {
        $warehousesText = '';
    }

    // Calculate statistics
    $totalPhases = count(explode("\n", trim($phasesText)));
    $totalDuration = calculateTotalDuration($phasesText);
    $availableUnits = getAvailableUnits($isDigital, $warehousesText);
    $finalPrice = calculatePrice($isDigital, $basePrice, $availableUnits, $developer);
    $stockByProvince = getStockByProvince($warehousesText);

    // Display results
    echo "<h1>Estadísticas del Videojuego</h1>";
    echo "<p>Número de Fases: $totalPhases</p>";
    echo "<p>Duración total del videojuego: $totalDuration min</p>";
    echo "<p>Cantidad de Unidades Disponibles: $availableUnits</p>";
    echo "<p>Precio: €$finalPrice</p>";
    echo "<h2>Stock por Provincia:</h2>";
    echo "<ul>";
    foreach ($stockByProvince as $province => $stock) {
        echo "<li>$province: $stock unidades</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No se recibieron datos del formulario.</p>";
}
?>