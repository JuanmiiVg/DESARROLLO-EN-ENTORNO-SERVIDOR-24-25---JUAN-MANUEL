<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar entrenador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h1 class="mt-2">Editar Entrenador</h1>
    </div>

    <form method="POST" action="/entrenadores/modificar" class="mt-4">
        <div class="mb-3">
            <label for="nif" class="form-label">Nif</label>
            <input type="text" name="nif" id="nif" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="altura" class="form-label">Altura</label>
            <input type="number" name="altura" id="altura" class="form-control" required>
        </div>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <button type="submit" class="btn btn-custom"> Guardar</button>
        <a href="/" class="btn btn-secondary"> Cancelar</a>
    </form>
</div>
</body>
</html>
