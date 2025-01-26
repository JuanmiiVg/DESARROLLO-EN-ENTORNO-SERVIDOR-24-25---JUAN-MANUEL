<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Entrenador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Detalles del Entrenador</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>ID</th>
            <td><?= $entrenador['id'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= htmlspecialchars($entrenador['nombre']) ?></td>
        </tr>
        <tr>
            <th>Experiencia</th>
            <td><?= $entrenador['experiencia'] ?> años</td>
        </tr>
    </table>

    <a href="/entrenadores" class="btn btn-secondary">Volver al listado</a>
</div>
</body>
</html>
