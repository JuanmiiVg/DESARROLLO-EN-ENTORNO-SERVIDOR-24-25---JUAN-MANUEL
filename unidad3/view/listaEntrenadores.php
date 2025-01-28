<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Entrenadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Lista de Entrenadores</h1>
    <a href="/entrenadores/crear" class="btn btn-success mb-3">Agregar Nuevo Entrenador</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nif</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Altura</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($entrenadores as $entrenador): ?>
            <tr>
                <td><?= $entrenador['idEntrenador'] ?></td>
                <td><?= $entrenador['nif'] ?></td>
                <td><?= $entrenador['nombre'] ?></td>
                <td><?= $entrenador['edad'] ?> años</td>
                <td><?= $entrenador['altura']?> cm</td>
                <td>
                    <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/entrenadores/<?= $entrenador['idEntrenador'] ?>/eliminar" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</body>
</html>