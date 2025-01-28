<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Listar Animales</h1>
    <a href="/animales/crear" class="btn btn-success mb-3">Agregar Nuevo Animal</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Edad</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($animales as $animal): ?>
            <tr>
                <td><?= $animal['id_animal'] ?></td>
                <td><?= $animal['nombre'] ?></td>
                <td><?= $animal['especie'] ?></td>
                <td><?= $animal['edad'] ?></td>
                <td>
                    <a href="/animales/<?= $animal['id_animal'] ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/animales/<?= $animal['id_animal'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/animales/<?= $animal['id_animal'] ?>/eliminar" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</body>
</html>