<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Detalles del Usuario</h1>

    <table class="table table-bordered mt-4">
        <tr>
            <th>ID</th>
            <td><?= $usuario['id_usuario'] ?></td>
        </tr>
        <tr>
            <th>Nombre de Usuario</th>
            <td><?= $usuario['nombre_usuario'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
        </tr>
        <tr>
            <th>Correo</th>
            <td><?= $usuario['correo'] ?></td>
        </tr>
        <tr>
            <th>Fecha de Registro</th>
            <td><?= $usuario['fecha_registro'] ?></td>
        </tr>
    </table>

    <a href="/" class="btn btn-secondary">Volver al listado</a>
</div>
</body>
</html>