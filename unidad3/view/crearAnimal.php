<!DOCTYPE html>
<html lang="en">
    <?php 
    include_once 'auth.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐾 Crear Animal</title>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/616/616430.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ea;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Logo PetConnect" class="pet-logo" width="60">
        <h1 class="mt-2">🐾 Agregar Nuevo Animal</h1>
    </div>

    <form method="POST" action="/animales/crear" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre 🐶</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="especie" class="form-label">Especie 🐾</label>
            <input type="text" name="especie" id="especie" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad 📅</label>
            <input type="number" name="edad" id="edad" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen 🖼️</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">✅ Guardar</button>
        <a href="/listaAnimales/1" class="btn btn-secondary">❌ Cancelar</a>
    </form>
</div>
</body>
</html>
