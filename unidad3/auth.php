<?php

use App\utils\Utils;

session_start();

// Definir el tiempo máximo de inactividad en segundos (2 minutos)
$tiempo_max_inactividad = 120;

// Si la sesión tiene una marca de tiempo previa
if (isset($_SESSION['ultimo_acceso'])) {
    $tiempo_transcurrido = time() - $_SESSION['ultimo_acceso'];

    // Si el tiempo transcurrido supera el máximo, cerrar la sesión
    if ($tiempo_transcurrido > $tiempo_max_inactividad) {
        session_unset(); // Eliminar variables de sesión
        session_destroy(); // Destruir la sesión
        Utils::redirect('/'); // Redirigir al inicio de sesión
        exit;
    }
}

// Actualizar el tiempo de último acceso
$_SESSION['ultimo_acceso'] = time();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    Utils::redirect('/');
    exit;
}
?>
