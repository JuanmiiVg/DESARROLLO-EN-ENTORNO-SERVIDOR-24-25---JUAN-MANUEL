<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Lista de Publicaciones</title>
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Publicaciones</h2>
    <a href="/publicacion/insertar.php" class="btn btn-success mb-3">Añadir Publicación</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Título</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($publicaciones as $publicacion): ?>
            <tr>
                <td>
                    <a href="/publicacion/detalle.php?id=<?= htmlspecialchars($publicacion['id_publicacion']) ?>">
                        <?= htmlspecialchars($publicacion['titulo']) ?>
                    </a>
                </td>
                <td><?= htmlspecialchars($publicacion['fecha_publicacion']) ?></td>
                <td>
                    <a href="/publicacion/modificar.php?id=<?= $publicacion['id_publicacion'] ?>" class="btn btn-warning btn-sm">Modificar</a>
                    <a href="/publicacion/eliminar.php?id=<?= $publicacion['id_publicacion'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Estás seguro de que deseas eliminar esta publicación?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
