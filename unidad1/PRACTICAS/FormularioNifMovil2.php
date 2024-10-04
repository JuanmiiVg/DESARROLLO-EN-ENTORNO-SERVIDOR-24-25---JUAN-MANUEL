<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Formulario</title>
</head>
<body>
    <h1>Información del Usuario</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $estado_social = $_POST['estado_social'];
        $vehiculo = $_POST['vehiculo'];

        // Mostrar la frase sin concatenación
        echo "<p>El usuario con dni {$dni} responde al teléfono {$telefono}, 
                 su estado social es {$estado_social} y viaja en {$vehiculo}.</p>";
    } else {
        echo "<p>No se ha enviado el formulario.</p>";
    }
    ?>

</body>
</html>
