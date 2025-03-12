<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Entrenador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Agregar Nuevo Entrenador</h1>

    <form method="POST" action="/entrenadores/crear" class="mt-4">
    <div class="mb-3">
            <label for="nif" class="form-label">nif</label>
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
            <label for="altura" class="form-label">altura</label>
            <input type="number" name="altura" id="altura" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
