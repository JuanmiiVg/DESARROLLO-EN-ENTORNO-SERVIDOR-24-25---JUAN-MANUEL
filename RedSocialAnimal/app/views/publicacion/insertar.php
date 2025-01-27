<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Crear Nueva Publicación</title>
</head>
<body>
<div class="container mt-5">
    <h2>Crear Nueva Publicación</h2>
    <form action="/publicacion/insertarHandler.php" method="post">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Publicación</button>
    </form>
</div>
</body>
</html>
