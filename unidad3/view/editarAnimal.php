<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Editar Nuevo Animal</h1>

    <form method="POST" action="/animales/modificar" class="mt-4" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

    <div class="mb-3">
            <label for="especie" class="form-label">Especie</label>
            <input type="text" name="especie" id="especie" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control" required>
        </div>
        <input type="hidden" name="imagen" value=" ">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
