<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Equipo</title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">Detalles del Equipo</h1>

        <table class="table table-bordered mt-4">
            <tr>
                <th>ID</th>
                <td><?= $equipo['idEquipo'] ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?= htmlspecialchars($equipo['nombre']) ?></td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td><?= $equipo['ciudad'] ?></td>
            </tr>
            <tr>
                <th>División</th>
                <td><?= $equipo['division'] ?></td>
            </tr>
            <tr>
                <th>Puntos</th>
                <td><?= $equipo['puntos'] ?></td>
            </tr>
            <tr>
                <th>ID Entrenador</th>
                <td><?= $equipo['Entrenador_idEntrenador'] ?></td>
            </tr>
        </table>

        <a href="/equipos?pagina=<?= $pagina ?>" class="btn btn-secondary">Volver al listado</a>
    </div>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>