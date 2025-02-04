<!DOCTYPE html>
<html lang="es">
<?php 
    include_once 'auth.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetConnect - Editar Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ea;
        }
        .btn-custom {
            background-color: #4CAF50;
            color: white;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
        .card {
            border-radius: 15px;
        }
        .pet-logo {
            width: 60px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Logo PetConnect" class="pet-logo">
        <h1 class="mt-2">✏️ Editar Animal</h1>
    </div>

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
        <input type="hidden" name="imagen" value="">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <button type="submit" class="btn btn-custom">💾 Guardar</button>
        <a href="/listaAnimales/1" class="btn btn-secondary">❌ Cancelar</a>
    </form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
