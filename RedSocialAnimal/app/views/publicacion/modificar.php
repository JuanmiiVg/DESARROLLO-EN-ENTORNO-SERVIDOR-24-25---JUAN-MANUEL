<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Modificar Publicación</title>
</head>
<body>
<div class="container mt-5">
    <h2>Modificar Publicación</h2>
    <form action="/publicacion/modificarHandler.php" method="post">
        <input type="hidden" name="id_publicacion" value="<?= htmlspecialchars($publicacion['id_publicacion']) ?>">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($publicacion['titulo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="5" required><?= htmlspecialchars($publicacion['contenido']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>
</div>
</body>
</html>
