<?php
ob_start(); // Iniciar el buffer de salida
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-info text-center">
                <h4>¡Verifica tu correo!</h4>
                <p>Te hemos enviado un correo de verificación. Por favor, revisa tu bandeja de entrada y sigue las instrucciones.</p>
                <p>Si no encuentras el correo, revisa tu carpeta de spam.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
ob_end_flush(); // Liberar el buffer de salida y mostrar el contenido
?>
