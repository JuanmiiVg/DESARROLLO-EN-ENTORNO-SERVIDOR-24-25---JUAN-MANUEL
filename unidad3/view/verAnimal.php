<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Detalles del Animal</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>ID</th>
            <td><?= $animal['id_animal'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $animal['nombre'] ?></td>
        </tr>
        <tr>
            <th>Especie</th>
            <td><?= $animal['especie'] ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?= $animal['edad'] ?> años</td>
        </tr>
        <tr>
            <th>Imagen</th>
            <td>
                <?php if (!empty($animal['imagen'])): ?>
                    <img src="../img/<?= $animal['imagen'] ?>" alt="Imagen de <?= $animal['nombre'] ?>" class="img-fluid" style="max-width: 300px; border-radius: 10px;">
                <?php else: ?>
                    <p>No hay imagen disponible</p>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <div class="container mt-4">
        <h1 class="text-center">Lista de Razas</h1>

        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Especie</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($razas as $raza): ?>
                <tr>
                    <td><?= $raza['id_raza'] ?></td>
                    <td><?= $raza['nombre_raza'] ?></td>
                    <td><?= $raza['descripcion'] ?></td>
                    <td><?= $raza['especie'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="/" class="btn btn-secondary">Volver al listado</a>
</div>
</body>
</html>
