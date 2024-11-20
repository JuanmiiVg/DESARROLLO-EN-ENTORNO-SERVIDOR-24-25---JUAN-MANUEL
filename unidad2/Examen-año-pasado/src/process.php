<?php
if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['estado']) && isset($_POST['sueldo'])){
    $nombre = $_POST['nombre'];
    $edad = (int)$_POST['edad'];
    $estado = $_POST['estado'];
    $sueldo = (int)$_POST['sueldo'];
    $textoHijos = $_POST['hijos'];
    $textoDomicilios = $_POST['domicilios'];

    include 'functions.php';

    $resultadoDomicilio = cumpleDomicilio($textoDomicilios);
    $resultadoHijos = cumpleHijos($textoHijos);

    $puedeRecibirAyuda = $edad >= 18 && $estado == 'casado' && $sueldo > 10000 && $sueldo < 30000 
                         && $resultadoHijos['cumpleCondiciones'] 
                         && $resultadoDomicilio['cumpleCondiciones'];

    echo "<h1>Resultados</h1>";
    if ($puedeRecibirAyuda) {
        echo "<p style='color: green;'>Cumple con las condiciones para recibir ayuda.</p>";
    } else {
        echo "<p style='color: red;'>No cumple con las condiciones para recibir ayuda.</p>";
    }

    if ($resultadoHijos['cumpleCondiciones']) {
        echo "<p>Media de edad de los hijos: " . $resultadoHijos['media'] . "</p>";
    } else {
        echo "<p>No cumple con las condiciones de los hijos.</p>";
    }

    if ($resultadoDomicilio['cumpleCondiciones']) {
        echo "<p>Cumple con las condiciones de los domicilios.</p>";
    } else {
        echo "<p>No cumple con las condiciones de los domicilios.</p>";
    }
} else {
    echo "<p>Acceso no permitido.</p>";
}
?>