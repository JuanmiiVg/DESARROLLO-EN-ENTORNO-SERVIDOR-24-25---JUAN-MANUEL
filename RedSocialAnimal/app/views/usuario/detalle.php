<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Detalle de Publicación</title>
</head>
<body>
<div class="container mt-5">
    <h2>Detalle de Publicación</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($publicacion['titulo']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($publicacion['contenido']) ?></p>
            <p><strong>Fecha:</strong> <?= htmlspecialchars($publicacion['fecha_publicacion']) ?></p>
            <h6>Imágenes Relacionadas:</h6>
            <ul>
                <?php foreach ($imagenes as $imagen): ?>
                    <li><img src="/img/<?= htmlspecialchars($imagen['nombre_archivo']) ?>" alt="" style="max-width: 200px;"></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <a href="/publicacion/lista.php" class="btn btn-primary mt-3">Volver</a>
</div>
</body>
</html>
