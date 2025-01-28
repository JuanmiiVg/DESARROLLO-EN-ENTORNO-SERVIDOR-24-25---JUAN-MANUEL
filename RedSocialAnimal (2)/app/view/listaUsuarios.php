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
    <h1 class="text-center">Lista de Usuarios</h1>
    <a href="/usuarios/crear" class="btn btn-success mb-3">Agregar Nuevo Usuario</a>

    <table class="table table-bordered">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de Registro</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id_usuario'] ?></td>
                <td><?= $usuario['nombre_usuario'] ?></td>
                <td><?= $usuario['correo'] ?></td>
                <td><?= $usuario['fecha_registro'] ?></td>
                <td>
                    <a href="/usuarios/<?= $usuario['id_usuario'] ?>" class="btn btn-info btn-sm">Ver</a>
                    <a href="/usuarios/<?= $usuario['id_usuario'] ?>/editar" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/usuarios/<?= $usuario['id_usuario'] ?>/eliminar" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </div>
</body>
</html>