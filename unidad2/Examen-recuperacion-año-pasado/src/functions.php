<?php

function calculateTotalDuration($phasesText) {
    $lines = explode("\n", trim($phasesText));
    $totalDuration = 0;

    foreach ($lines as $line) {
        $parts = preg_split('/\s+/', $line);
        if (count($parts) >= 2) {
            $totalDuration += (int)$parts[1]; // Add the duration (second part)
        }
    }

    return $totalDuration;
}

function getAvailableUnits($isDigital, $warehousesText) {
    if ($isDigital === 'S') {
        return 'Ilimitadas';
    }

    $lines = explode("\n", trim($warehousesText));
    $totalUnits = 0;

    foreach ($lines as $line) {
        $parts = preg_split('/\s+/', $line);
        if (count($parts) >= 3) {
            $totalUnits += (int)$parts[2]; // Add the stock (third part)
        }
    }

    return $totalUnits;
}

function calculatePrice($isDigital, $basePrice, $totalUnits, $developer) {
    $finalPrice = $basePrice;

    if ($isDigital === 'S') {
        $finalPrice *= 0.8; // 20% discount for digital
    }

    if ($totalUnits < 20) {
        $finalPrice *= 1.2; // 20% increase if less than 20 units
    }

    if (in_array($developer, ['nintendo', 'rockstar']) && $totalUnits > 20) {
        $finalPrice += 5; // Additional cost for specific developers
    }

    return $finalPrice;
}

function getStockByProvince($warehousesText) {
    $lines = explode("\n", trim($warehousesText));
    $stockByProvince = [];

    foreach ($lines as $line) {
        $parts = preg_split('/\s+/', $line);
        if (count($parts) >= 4) {
            $province = $parts[0];
            $quantity = (int)$parts[2]; // Stock quantity

            if (!isset($stockByProvince[$province])) {
                $stockByProvince[$province] = 0;
            }
            $stockByProvince[$province] += $quantity; // Sum stock by province
        }
    }

    return $stockByProvince;
}